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
     * @param int            $source @see Order::SOURCES
     * @param array          $products
     * @param string         $deliveryLatitude
     * @param string         $deliveryLongitude
     * @param string|null    $additionalNote
     * @param PromoCode|null $promoCode
     *
     * @return Order
     * @throws OrderException
     */
    public function create(Client $client, $source, $products, $deliveryLatitude, $deliveryLongitude, $additionalNote = null, PromoCode $promoCode = null)
    {
        $order    = new Order();
        $location = $this->shop->nearestLocation($deliveryLatitude, $deliveryLongitude);

        $order->source             = $source;
        $order->client_id          = $client->id;
        $order->location_id        = $location->id;
        $order->additional_note    = $additionalNote;
        $order->associated_phone   = $client->phone;
        $order->collection_method  = Order::COLLECTION_METHOD_DELIVER; // TODO: make dynamic
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

        return $order;
    }

    /**
     * @param array $productsInput
     *
     * @return array
     * @throws OrderException
     */
    public function validateAndCalculateProductsPrice($productsInput)
    {
        $totalPrice = 0;
        $productsFromDb = $this->productsFromInput($productsInput);

        foreach ($productsInput as $product) {
            /** @var Product $productFromDb */
            $productFromDb = $productsFromDb->get($product['product_id']);
            if (! $productFromDb) {
                throw new OrderException('product:not_found');
            }

            $ingredients = $product['ingredients'] ?? null;
            if ($productFromDb->type !== Product::TYPE_WITH_INGREDIENTS || ! $ingredients) {
                continue;
            }

            $this->validateIngredientsForProducts($productFromDb, $ingredients);
            $totalPrice += $productFromDb->price;
        }

        return $totalPrice;
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
            ->get()
            ->keyBy('id');
    }

    /**
     * @param Product $product
     * @param array   $ingredientsInput
     *
     * @throws OrderException
     */
    public function validateIngredientsForProducts(Product $product, $ingredientsInput)
    {
        $ingredientsFromDb       = [];
        $ingredientCategoryRules = [];
        /** @var IngredientCategory $ingredientCategory */
        foreach ($product->ingredientCategories as $ingredientCategory) {
            $ingredientCategoryRules[$ingredientCategory->id] = $ingredientCategory->ingredientsValidationRules();
            $ingredientsFromDb += $ingredientCategory->ingredients->keyBy('id')->all();
        }
\Log::info([$ingredientsFromDb]);
        $ingredientCategoryCheck = [];
        foreach ($ingredientsInput as $ingredient) {
            /** @var Ingredient $ingredientFromDb */
            $ingredientFromDb     = $ingredientsFromDb[$ingredient['id']];
            $ingredientCategoryId = $ingredientFromDb->ingredient_category_id;
            if (! isset($ingredientFromDb)) {
                throw new OrderException('ingredient:not_found');
            }

            if (isset($ingredientCategoryCheck[$ingredientCategoryId])) {
                $ingredientCategoryCheck[$ingredientCategoryId]['ingredients_count']++;
            } else {
                $ingredientCategoryCheck[$ingredientCategoryId] = [ 'ingredients_count' => 1, ];
            }

            if ($ingredientCategoryCheck[$ingredientCategoryId]['ingredients_count'] > $ingredientCategoryRules[$ingredientCategoryId]['max_ingredients']) {
                throw new OrderException('ingredient_category:max_ingredients');
            }
        }
    }

    /**
     * @param Order $order
     * @param array $productsInput
     */
    public function saveProductsForOrder(Order $order, $productsInput)
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

        $orderProducts = $order->products()->get();
        /** @var Product $product */
        $ingredientsRelationshipInfos = [];
        foreach ($orderProducts as $index => $product) {
            if ($product->type !== Product::TYPE_WITH_INGREDIENTS || ! $productsInput[$index]['ingredients']) {
                continue;
            }

            $orderProductId = $product->pivot->id;
            foreach ($productsInput[$index]['ingredients'] as $ingredient) {
                $ingredientsRelationshipInfos[] = [
                    'quantity'         => $ingredient['quantity'] ?? 0,
                    'ingredient_id'    => $ingredient['id'],
                    'order_product_id' => $orderProductId,
                ];
            }
        }

        \DB::table('ingredient_order_product')->insert($ingredientsRelationshipInfos);
    }

}
