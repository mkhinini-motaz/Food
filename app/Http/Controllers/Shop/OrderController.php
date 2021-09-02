<?php

namespace App\Http\Controllers\Shop;

use App\Models\ShopUser;
use App\Http\Controllers\Controller;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ResourceCollection;
use App\Models\Order;
use App\Models\Shop;
use App\Models\Transporter;
use App\Repositories\OrderRepository;
use App\Repositories\ShopRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function current(Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $shopRepository = new ShopRepository($shop);

        $page    = $request->input('page', 1);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');

        $orders = $shopRepository->paginateOrders($page, $perPage, $orderBy, $orderDirection, true, Order::ACTIVE_SHOP_STATUSES);

        return ResourceCollection::jsonResponse($orders);
    }

    /**
     * @param int     $orderId
     * @param Request $request
     *
     * @return OrderResource
     */
    public function attachTransporter($orderId, Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');

        /** @var Order $order */
        $order = $shop->activeOrders()->findOrFail($orderId);

        $shopTransporterId = $request->input('transporter_id');
        /** @var ShopUser $shopTransporter */
        $shopTransporter = $shop->shopTransporters()->findOrFail($shopTransporterId);

        $orderRepo = new OrderRepository($order);
        $orderRepo->attachShopTransporter($shopTransporter);

        return (new OrderResource($order));
    }

    // TODO: WS mark order as started
    // TODO: WS mark order as ready
}
