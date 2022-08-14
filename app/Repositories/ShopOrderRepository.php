<?php

namespace App\Repositories;

use App\Exceptions\OrderException;
use App\Models\Choice;
use App\Models\Client;
use App\Models\Option;
use App\Models\OptionGroup;
use App\Models\Order;
use App\Models\Product;
use App\Models\PromoCode;
use App\Models\Shop;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Throwable;

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
     * @param array          $products
     * @param string         $deliveryLatitude
     * @param string         $deliveryLongitude
     * @param int            $source @see Order::SOURCES
     * @param int            $type   @see Order::TYPES
     * @param string         $associatedPhone
     * @param Client         $client
     * @param bool           $isPayed
     * @param string|null    $additionalNote
     * @param PromoCode|null $promoCode
     *
     * @return Order
     * @throws OrderException
     * @throws Throwable
     */
    public function create($products, $deliveryLatitude, $deliveryLongitude, $source, $type, $associatedPhone, Client $client = null, $isPayed = false, $additionalNote = null, PromoCode $promoCode = null)
    {
        $order = new Order();
        $location = $this->shop->nearestLocation($deliveryLatitude, $deliveryLongitude);

        $order->type               = $type;
        $order->status             = Order::STATUS_NEW;
        $order->source             = $source;
        $order->is_payed           = $isPayed;
        $order->location_id        = $location->id;
        $order->additional_note    = $additionalNote;
        $order->associated_phone   = $associatedPhone;
        $order->delivery_latitude  = $deliveryLatitude;
        $order->delivery_longitude = $deliveryLongitude;

        $productsFromDb = $this->productsFromInput($products)
            ->keyBy('id');
        $order->total_price = $this->validateAndCalculateProductsPrice($products, $productsFromDb);

        if ($client) {
            $order->client_id = $client->id;
            if (! $associatedPhone) {
                $order->associated_phone = $client->phone;
            }
        }

        if ($promoCode) {
            $order->total_price   -= $promoCode->reduction_amount;
            $order->total_price   = $order->total_price > 0 ? $order->total_price : 0;
            $order->promo_code_id = $promoCode->id;
        }

        $optionsPrices = $this->optionsPricesByProduct($productsFromDb);
        try {
            DB::beginTransaction();
            $order->saveOrFail();
            $this->saveChoicesForOrder($order, $products);
            $this->saveOptionsForOrder($order, $products, $optionsPrices);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getTraceAsString());
            throw new OrderException('order:save:fail');
        }

        return $order;
    }

    /**
     * @param array      $productsInput
     * @param Collection $productsFromDb
     *
     * @return int
     * @throws OrderException
     */
    public function validateAndCalculateProductsPrice($productsInput, $productsFromDb)
    {
        $totalPrice = 0;

        foreach ($productsInput as $product) {
            /** @var Product $productFromDb */
            $productFromDb = $productsFromDb->get($product['product_id']);
            if (! $productFromDb) {
                throw new OrderException('product:not_found');
            }

            $optionsInput = $product['options'] ?? null;
            if ($productFromDb->type !== Product::TYPE_WITH_OPTIONS || ! $optionsInput) {
                $optionsPrice = 0;
            } else {
                $optionsPrice = $this->validateAndCalculatePriceForProductOptions($productFromDb, $optionsInput);
            }

            $count = $product['product_count'] ?? 1;
            $totalPrice += ($productFromDb->price + $optionsPrice) * $count;
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
        [$optionGroupCheck, $optionsFromDb, $optionGroupRules] = $this->prepareOptionGroupsForValidation($product);
        $optionsAddedPrice = 0;
        foreach ($optionsInput as $option) {
            /** @var Option $optionFromDb */
            $optionFromDb = $optionsFromDb[$option['id']];
            $optionGroupId = $optionFromDb->pivot->option_group_id;

            if (! isset($optionFromDb)) {
                throw new OrderException('option:not_found');
            }
            if ($optionGroupCheck[$optionGroupId]['options_count'] > $optionGroupRules[$optionGroupId]['max_options']) {
                throw new OrderException('option_group:max_options');
            }

            $optionsAddedPrice += $optionFromDb->pivot->price;
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
        $productsIds = [];
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
        $optionsFromDb = [];
        $optionGroupCheck = [];
        $optionGroupRules = [];

        /** @var OptionGroup $optionGroup */
        foreach ($product->optionGroups as $optionGroup) {
            $optionGroupCheck[$optionGroup->id] = ['options_count' => 0];
            $optionGroupRules[$optionGroup->id] = $optionGroup->optionsValidationRules();
            $optionsFromDb += $optionGroup->options->keyBy('id')->all();
        }

        return [$optionGroupCheck, $optionsFromDb, $optionGroupRules];
    }

    /**
     * @param Order $order
     * @param array $productsInput
     */
    private function saveChoicesForOrder(Order $order, $productsInput)
    {
        $productRelationshipInfos = [];
        foreach ($productsInput as $product) {
            $productRelationshipInfos[] = [
                'order_id'      => $order->id,
                'product_id'    => $product['product_id'],
                'product_count' => $product['product_count'],
                'created_at'    => time(),
                'updated_at'    => time(),
            ];
        }

        \DB::table('choices')->insert($productRelationshipInfos); // TODO: better code
    }

    /**
     * @param Order $order
     * @param array $productsInput
     * @param array $optionsPrices
     */
    private function saveOptionsForOrder(Order $order, $productsInput, $optionsPrices)
    {
        /** @var Choice[] $choices */
        $choices = $order->choices()->get();

        $optionsRelationshipInfos = [];
        foreach ($choices as $index => $choice) {
            if (! isset($productsInput[$index]['options'])) {
                continue;
            }

            $choiceId = $choice->id;
            foreach ($productsInput[$index]['options'] as $option) {
                $optionId = $option['id'];
                $optionsRelationshipInfos[$optionId] = [
                    'choice_id' => $choiceId,
                    'option_id' => $optionId,
                    'quantity'  => $option['quantity'] ?? 0,
                    'price'     => $optionsPrices[$choice->product_id][$optionId],
                ];
            }
        }

        \DB::table('choice_option')->insert($optionsRelationshipInfos); // TODO: better code
    }

    /**
     * @param Collection $products
     *
     * @return array
     */
    private function optionsPricesByProduct(Collection $products)
    {
        $prices = [];

        foreach ($products as $product) {
            $productId = $product->id;
            if (! isset($prices[$productId])) {
                $prices[$productId] = [];
            }

            foreach ($product->optionGroups as $optionGroup) {
                foreach ($optionGroup->options as $option) {
                    $prices[$productId][$option->id] = $option->pivot->price;
                }
            }
        }

        return $prices;
    }
}
