<?php

namespace App\Repositories;

use App\Exceptions\OrderException;
use App\Models\Client;
use App\Models\Option;
use App\Models\OptionGroup;
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
        $this->saveOptionsForOrder($order, $products);

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

            $optionsInput = $product['options'] ?? null;
            if ($productFromDb->type !== Product::TYPE_WITH_OPTIONS || ! $optionsInput) {
                continue;
            }

            $optionsPrice = $this->validateAndCalculatePriceForProductOptions($productFromDb, $optionsInput);
            $totalPrice += $productFromDb->price + $optionsPrice;
        }

        return $totalPrice;
    }

    /**
     * @param Product $product
     * @param array   $optionsInput
     *
     * @return int
     * @throws OrderException
     */
    public function validateAndCalculatePriceForProductOptions(Product $product, $optionsInput)
    {
        [ $optionGroupCheck, $optionsFromDb, $optionGroupRules ] = $this->prepareOptionGroupsForValidation($product);
        $optionsAddedPrice   = 0;
        foreach ($optionsInput as $option) {
            /** @var Option $optionFromDb */
            $optionFromDb  = $optionsFromDb[$option['id']];
            $optionGroupId = $optionFromDb->pivot->option_group_id;

            if (! isset($optionFromDb)) {
                throw new OrderException('option:not_found');
            }
            if ($optionGroupCheck[$optionGroupId]['options_count'] > $optionGroupRules[$optionGroupId]['max_options']) {
                throw new OrderException('option_group:max_options');
            }

            $optionsAddedPrice += $optionFromDb->price;
            $optionGroupCheck[$optionGroupId]['options_count']++;
        }

        return $optionsAddedPrice;
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
            ->with('optionGroups.options')
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
     * @return array [ 0 => $optionGroupCheck, 1 => $optionsFromDb, 2 => $optionGroupRules ]
     */
    private function prepareOptionGroupsForValidation(Product $product)
    {
        $optionsFromDb    = [];
        $optionGroupCheck = [];
        $optionGroupRules = [];

        /** @var OptionGroup $optionGroup */
        foreach ($product->optionGroups as $optionGroup) {
            $optionGroupCheck[$optionGroup->id] = [ 'options_count' => 0 ];
            $optionGroupRules[$optionGroup->id] = $optionGroup->optionsValidationRules();
            $optionsFromDb += $optionGroup->options->keyBy('id')->all();
        }

        return [ $optionGroupCheck, $optionsFromDb, $optionGroupRules ];
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
    private function saveOptionsForOrder(Order $order, $productsInput)
    {
        $orderProducts = $order->products()->get();
        /** @var Product $product */
        $optionsRelationshipInfos = [];
        foreach ($orderProducts as $index => $product) {
            if ($product->type !== Product::TYPE_WITH_OPTIONS || ! $productsInput[$index]['options']) {
                continue;
            }

            $orderProductId = $product->pivot->id;
            foreach ($productsInput[$index]['options'] as $option) {
                $optionsRelationshipInfos[] = $this->optionRelationshipInfoFromInput($option, $orderProductId);
            }
        }

        \DB::table('option_order_product')->insert($optionsRelationshipInfos);
    }

    /**
     * @param array $optionInput
     * @param int   $orderProductId
     *
     * @return array
     */
    private function optionRelationshipInfoFromInput($optionInput, $orderProductId)
    {
        return [
            'quantity'         => $optionInput['quantity'] ?? 0,
            'option_id'    => $optionInput['id'],
            'order_product_id' => $orderProductId,
        ];
    }
}
