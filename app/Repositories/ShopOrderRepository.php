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
     * @var Order
     */
    private $order = null;

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
        $this->order = new Order();
        return $this->hydrate($products, $deliveryLatitude, $deliveryLongitude, $source, $type, $associatedPhone, $client, $isPayed, $additionalNote, $promoCode);
    }

    /**
     * @param int            $orderId
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
    public function update($orderId, $products, $deliveryLatitude, $deliveryLongitude, $source, $type, $associatedPhone, Client $client = null, $isPayed = false, $additionalNote = null, PromoCode $promoCode = null)
    {
        $this->order = $this->shop->orders()->findOrFail($orderId);
        $choiceIds   = $this->order->choices()->pluck('id');

        \DB::table('choice_option')
            ->whereIn('choice_id', $choiceIds)
            ->delete();
        $this->order->choices()->delete();

        return $this->hydrate($products, $deliveryLatitude, $deliveryLongitude, $source, $type, $associatedPhone, $client, $isPayed, $additionalNote, $promoCode);
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
    public function hydrate($products, $deliveryLatitude, $deliveryLongitude, $source, $type, $associatedPhone, Client $client = null, $isPayed = false, $additionalNote = null, PromoCode $promoCode = null)
    {
        $location = $this->shop->nearestLocation($deliveryLatitude, $deliveryLongitude);

        $this->order->type               = $type;
        $this->order->status             = Order::STATUS_NEW;
        $this->order->source             = $source;
        $this->order->is_payed           = $isPayed;
        $this->order->location_id        = $location->id;
        $this->order->additional_note    = $additionalNote;
        $this->order->associated_phone   = $associatedPhone;
        $this->order->delivery_latitude  = $deliveryLatitude;
        $this->order->delivery_longitude = $deliveryLongitude;

        $productsFromDb = $this->productsFromInput($products)
            ->keyBy('id');
        $this->order->total_price = $this->validateAndCalculateProductsPrice($products, $productsFromDb);

        if ($client) {
            $this->order->client_id = $client->id;
            if (! $associatedPhone) {
                $this->order->associated_phone = $client->phone;
            }
        }

        if ($promoCode) {
            $this->order->total_price   -= $promoCode->reduction_amount;
            $this->order->total_price   = $this->order->total_price > 0 ? $this->order->total_price : 0;
            $this->order->promo_code_id = $promoCode->id;
        }

        $optionsPrices = $this->optionsPricesByProduct($productsFromDb);
        try {
            DB::beginTransaction();
            $this->order->saveOrFail();
            $this->saveChoicesForOrder($this->order, $products, $productsFromDb);
            $this->saveOptionsForOrder($this->order, $products, $optionsPrices);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error($e->getMessage());
            \Log::error($e->getTraceAsString());
            throw new OrderException('order:save:fail');
        }

        return $this->order;
    }

    /**
     * @param array      $productsInput
     * @param Collection $productsFromDb
     *
     * @return int
     * @throws OrderException
     */
    public function validateAndCalculateProductsPrice(&$productsInput, $productsFromDb)
    {
        $totalPrice = 0;

        foreach ($productsInput as &$product) {
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
            $product['product_price'] = $productFromDb->price;
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
            ->orderBy('categories.order')
            ->orderBy('products.order')
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
    private function saveChoicesForOrder(Order $order, $productsInput, $products)
    {
        $productIds = $products->keyBy('id')->keys()->toarray();
        $productsInput = collect($productsInput);
        $productsInput = $productsInput->sortBy(function($productInput) use ($productIds) {
            return array_search($productInput['product_id'], $productIds);
        });
        $productRelationshipInfos = [];
        foreach ($productsInput as $product) {
            $productRelationshipInfos[] = [
                'order_id'      => $order->id,
                'product_id'    => $product['product_id'],
                'product_count' => $product['product_count'],
                'product_price' => $product['product_price'],
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
        $choices = $order->choices()
            ->with('product.options')
            ->get();

        $optionsRelationshipInfos = [];
        $productsInput = collect($productsInput);
        foreach ($choices as $index => $choice) {
            $productInput = $productsInput->where('product_id', '=', $choice->product_id)
                ->first();
            if (! isset($productInput['options'])) {
                continue;
            }

            $optionKeys = $choice->product->options->keyBy('id')->keys()->toArray();
            $optionInputs = collect($productInput['options'])->sortBy(function($optionInput) use ($optionKeys) {
                return array_search($optionInput['id'], $optionKeys);
            });

            $choiceId = $choice->id;
            foreach ($optionInputs as $option) {
                $optionId = $option['id'];
                $optionsRelationshipInfos[] = [
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
