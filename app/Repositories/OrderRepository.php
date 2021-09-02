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
        $ordersIds = $orders->pluck('id');
        $choices = OptionOrderProductRepository::optionChoicesForOrders($ordersIds);

        foreach ($orders as $order) {
            foreach ($order->products as $product) {
                $productChoices = $choices[$product->pivot->id] ?? [];
                ProductRepository::attachOptionChoicesToProduct($product, $productChoices);
            }
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
}
