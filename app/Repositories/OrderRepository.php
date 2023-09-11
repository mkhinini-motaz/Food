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
     * @param $page
     * @param $perPage
     * @param $orderBy
     * @param $orderDirection
     *
     * @return mixed
     */
    public static function paginateOrders($page, $perPage, $orderBy, $orderDirection)
    {
        $orders = Order::query()
            ->withNeededRelationsForAdmin();

        if (isset($orderBy) && isset($orderDirection)) {
            $orders->orderBy($orderBy, $orderDirection);
        }

        return $orders->paginate($perPage, [ '*' ], 'page', $page);
    }

    /**
     * @param ShopUser $shopTransporter
     */
    public function attachShopTransporter(ShopUser $shopTransporter = null)
    {
        $this->order->shop_transporter_id = $shopTransporter->id ?? null;
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
