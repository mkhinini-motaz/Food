<?php

namespace App\Repositories;

use App\Models\Order;
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
        $choices = IngredientOrderProductRepository::ingredientChoicesForOrders($ordersIds);

        foreach ($orders as $order) {
            foreach ($order->products as $product) {
                $productChoices = $choices[$product->pivot->id] ?? [];
                ShopRepository::attachIngredientChoicesToProduct($product, $productChoices);
            }
        }

        return $orders;
    }

    /**
     * @param Transporter $transporter
     */
    public function attachTransporter(Transporter $transporter)
    {
        $this->order->transporter_id = $transporter->id;
        $this->order->save();
    }
}
