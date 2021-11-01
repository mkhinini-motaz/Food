<?php

namespace App\Http\Controllers\Shop;

use App\Events\OrderAction;
use App\Models\Order;
use App\Models\Shop;
use App\Models\ShopUser;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ResourceCollection;
use App\Repositories\OrderRepository;
use App\Repositories\ShopRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Order\OrderStatusUpdateRequest;

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

        $orders = $shopRepository->paginateOrders($page, $perPage, $orderBy, $orderDirection, true);

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
        $order = $shop->orders()->findOrFail($orderId);

        $shopTransporterId = $request->input('transporter_id');
        /** @var ShopUser $shopTransporter */
        $shopTransporter = $shop->shopTransporters()->findOrFail($shopTransporterId);

        $orderRepo = new OrderRepository($order);
        $orderRepo->attachShopTransporter($shopTransporter);

        OrderAction::dispatch($order->id);

        return (new OrderResource($order));
    }


    /**
     * @param int                      $orderId
     * @param OrderStatusUpdateRequest $request
     *
     * @return OrderResource
     */
    public function updateStatus($orderId, OrderStatusUpdateRequest $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');

        /** @var Order $order */
        $order = $shop->orders()->findOrFail($orderId);

        $status = $request->input('status');
        $orderRepo = new OrderRepository($order);
        $orderRepo->updateStatus($status);

        OrderAction::dispatch($order->id);

        return (new OrderResource($order));
    }
}
