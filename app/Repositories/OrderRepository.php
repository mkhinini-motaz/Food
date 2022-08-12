<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\ShopUser;
use App\Models\Transporter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class OrderRepository
{
    /**
     * @var Order
     */
    private $order;

    /**
     * OrderRepository constructor.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * @param Collection|array|LengthAwarePaginator $orders
     *
     * @return Collection|array|LengthAwarePaginator
     */
    public static function attachChoicesToOrders($orders)
    {
// TODO: refactor
        $ordersIds = $orders->pluck('id');
        $choiceOptionRelationData = OptionOrderProductRepository::optionChoicesForOrders($ordersIds);

        foreach ($orders as &$order) {
            $products = [];
            foreach ($order->choices as $choice) {
                $product = $choice->product->replicate();
                $productChoicesRelationData = $choiceOptionRelationData[$choice->id] ?? [];
                ProductRepository::attachOptionChoicesToProduct($product, $choice, $productChoicesRelationData);
                $products[] = $product;
            }
            $order->products = $products;
        }

        return $orders;
    }

    /**
     * @param ShopUser $shopTransporter
     */
    public function attachShopTransporter(ShopUser $shopTransporter)
    {
        $this->order->shop_transporter_id = $shopTransporter->id;
        $this->order->save();
    }

    /**
     * @param $status
     */
    public function updateStatus($status)
    {
        $this->order->status = $status;
        $this->order->save();
    }

    /**
     * @param bool $isPayed
     */
    public function updateIsPayed($isPayed)
    {
        $this->order->is_payed = $isPayed;
        $this->order->save();
    }

    /**
     * @return array
     */
    public function productsShopIds()
    {
        return [1];

// TODO: fix
        $products = $this->order->products()
            ->with('shop')
            ->get();

        $shopIds = [];
        foreach ($products as $product) {
            $shopIds[$product->shop->id] = 1;
        }

        return array_keys($shopIds);
    }
}
