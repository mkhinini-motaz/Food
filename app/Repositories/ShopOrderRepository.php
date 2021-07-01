<?php

namespace App\Repositories;

use App\Exceptions\OrderException;
use App\Models\Client;
use App\Models\Ingredient;
use App\Models\IngredientCategory;
use App\Models\Order;
use App\Models\Product;
use App\Models\PromoCode;
use App\Models\Shop;

use Illuminate\Database\Eloquent\Collection;

class ShopOrderRepository
{
    /**
     * @var Shop
     */
    private $shop;

    /**
     * ShopRepository constructor.
     *
     * @param Shop $shop
     */
    public function __construct(Shop $shop)
    {
        $this->shop = $shop;
    }

    /**
     * @param Client         $client
     * @param array          $products
     * @param string         $deliveryLatitude
     * @param string         $deliveryLongitude
     * @param int            $source @see Order::SOURCES
     * @param int            $collectionMethod @see Order::COLLECTION_METHODS
     * @param string|null    $additionalNote
     * @param PromoCode|null $promoCode
     *
     * @return Order
     * @throws OrderException
     */
    public function create(Client $client, $products, $deliveryLatitude, $deliveryLongitude, $source, $collectionMethod, $additionalNote = null, PromoCode $promoCode = null)
    {
        $order    = new Order();
        $location = $this->shop->nearestLocation($deliveryLatitude, $deliveryLongitude);

        $order->status             = Order::STATUS_NEW;
        $order->source             = $source;
        $order->client_id          = $client->id;
        $order->location_id        = $location->id;
        $order->additional_note    = $additionalNote;
        $order->associated_phone   = $client->phone;
        $order->collection_method  = $collectionMethod;
        $order->delivery_latitude  = $deliveryLatitude;
        $order->delivery_longitude = $deliveryLongitude;

        $order->total_price = $this->validateAndCalculateProductsPrice($products);

        if ($promoCode) {
            $order->total_price   -= $promoCode->reduction_amount;
            $order->total_price   = $order->total_price > 0 ? $order->total_price : 0;
            $order->promo_code_id = $promoCode->id;
        }

        $order->save();
        $this->saveProductsForOrder($order, $products);
        $this->saveIngredientsForOrder($order, $products);

        return $order;
    }

    /**
     * @param array $productsInput
     *
     * @return int
     * @throws OrderException
     */
    public function validateAndCalculateProductsPrice($productsInput)
    {
        $totalPrice = 0;
        $productsFromDb = $this->productsFromInput($productsInput)
            ->keyBy('id');

        foreach ($productsInput as $product) {
            /** @var Product $productFromDb */
            $productFromDb = $productsFromDb->get($product['product_id']);
            if (! $productFromDb) {
                throw new OrderException('product:not_found');
            }

            $ingredientsInput = $product['ingredients'] ?? null;
            if ($productFromDb->type !== Product::TYPE_WITH_INGREDIENTS || ! $ingredientsInput) {
                continue;
            }

            $ingredientsPrice = $this->validateAndCalculatePriceForProductIngredients($productFromDb, $ingredientsInput);
            $totalPrice += $productFromDb->price + $ingredientsPrice;
        }

        return $totalPrice;
    }

    /**
     * @param Product $product
     * @param array   $ingredientsInput
     *
     * @return int
     * @throws OrderException
     */
    public function validateAndCalculatePriceForProductIngredients(Product $product, $ingredientsInput)
    {
        [ $ingredientCategoryCheck, $ingredientsFromDb, $ingredientCategoryRules ] = $this->prepareIngredientCategoriesForValidation($product);

        $ingredientsAddedPrice   = 0;
        foreach ($ingredientsInput as $ingredient) {
            /** @var Ingredient $ingredientFromDb */
            $ingredientFromDb     = $ingredientsFromDb[$ingredient['id']];
            $ingredientCategoryId = $ingredientFromDb->ingredient_category_id;

            if (! isset($ingredientFromDb)) {
                throw new OrderException('ingredient:not_found');
            }
            if ($ingredientCategoryCheck[$ingredientCategoryId]['ingredients_count'] > $ingredientCategoryRules[$ingredientCategoryId]['max_ingredients']) {
                throw new OrderException('ingredient_category:max_ingredients');
            }

            $ingredientsAddedPrice += $ingredientFromDb->price;
            $ingredientCategoryCheck[$ingredientCategoryId]['ingredients_count']++;
        }

        return $ingredientsAddedPrice;
    }

    /**
     * @param array $productsInput
     *
     * @return Collection
     */
    public function productsFromInput($productsInput)
    {
        $productsIds   = [];
        foreach ($productsInput as $product) {
            $productsIds[] = $product['product_id'];
        }

        return $this->shop->products()
            ->with('ingredientCategories.ingredients')
            ->whereIn('products.id', $productsIds)
            ->get();
    }

    /**
     * @param string $latitude
     * @param string $longitude
     *
     * @return int
     */
    public function deliveryCost($latitude, $longitude)
    {

        return 2000; // TODO: implement
    }

    /**
     * @param Product $product
     *
     * @return array
     */
    private function prepareIngredientCategoriesForValidation(Product $product)
    {
        $ingredientsFromDb       = [];
        $ingredientCategoryCheck = [];
        $ingredientCategoryRules = [];

        /** @var IngredientCategory $ingredientCategory */
        foreach ($product->ingredientCategories as $ingredientCategory) {
            $ingredientCategoryCheck[$ingredientCategory->id] = [ 'ingredients_count' => 0 ];
            $ingredientCategoryRules[$ingredientCategory->id] = $ingredientCategory->ingredientsValidationRules();
            $ingredientsFromDb += $ingredientCategory->ingredients->keyBy('id')->all();
        }

        return [ $ingredientCategoryCheck, $ingredientsFromDb, $ingredientCategoryRules ];
    }

    /**
     * @param Order $order
     * @param array $productsInput
     */
    private function saveProductsForOrder(Order $order, $productsInput)
    {
        $productRelationshipInfos = [];
        foreach ($productsInput as $product) {
            $productRelationshipInfos[] = [
                'order_id'      => $order->id,
                'product_id'    => $product['product_id'],
                'product_count' => $product['product_count'],
            ];
        }

        \DB::table('order_product')->insert($productRelationshipInfos);
    }

    /**
     * @param Order $order
     * @param array $productsInput
     */
    private function saveIngredientsForOrder(Order $order, $productsInput)
    {
        $orderProducts = $order->products()->get();
        /** @var Product $product */
        $ingredientsRelationshipInfos = [];
        foreach ($orderProducts as $index => $product) {
            if ($product->type !== Product::TYPE_WITH_INGREDIENTS || ! $productsInput[$index]['ingredients']) {
                continue;
            }

            $orderProductId = $product->pivot->id;
            foreach ($productsInput[$index]['ingredients'] as $ingredient) {
                $ingredientsRelationshipInfos[] = $this->ingredientRelationshipInfoFromInput($ingredient, $orderProductId);
            }
        }

        \DB::table('ingredient_order_product')->insert($ingredientsRelationshipInfos);
    }

    /**
     * @param array $ingredientInput
     * @param int   $orderProductId
     *
     * @return array
     */
    private function ingredientRelationshipInfoFromInput($ingredientInput, $orderProductId)
    {
        return [
            'quantity'         => $ingredientInput['quantity'] ?? 0,
            'ingredient_id'    => $ingredientInput['id'],
            'order_product_id' => $orderProductId,
        ];
    }
}
