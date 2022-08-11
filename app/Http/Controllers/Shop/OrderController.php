<?php

namespace App\Http\Controllers\Shop;

use App\Events\OrderAction;
use App\Exceptions\OrderException;
use App\Http\Requests\Shop\Order\OrderIsPayedUpdateRequest;
use App\Http\Resources\Resource;
use App\Models\Order;
use App\Models\PromoCode;
use App\Models\Shop;
use App\Models\ShopUser;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ResourceCollection;
use App\Repositories\OrderRepository;
use App\Repositories\ShopOrderRepository;
use App\Repositories\ShopRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\Order\OrderCreateRequest;
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

        $orders = $shopRepository->paginateOrders($page, 200, $orderBy, $orderDirection, true);

        return ResourceCollection::jsonResponse($orders);
    }

    /**
     * @param OrderCreateRequest $request
     *
     * @return JsonResponse
     * @throws OrderException
     */
    public function create(OrderCreateRequest $request)
    {
        $type              = $request->input('type', false);
        $source            = $request->input('source', false);
        $isPayed           = $request->input('is_payed', false);
        $products          = $request->input('products');
        $promoCodeId       = $request->input('promo_code_id', null);
        $additionalNote    = $request->input('additional_note', null);
        $associatedPhone   = $request->input('associatedPhone', null);
        $deliveryLatitude  = $request->input('delivery_latitude', null);
        $deliveryLongitude = $request->input('delivery_longitude', null);
// TODO: client

        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var PromoCode $promoCode */
// TODO: refactor duplicate db query
        $promoCode = ! $promoCodeId || ! PromoCode::promoCodeExistsAndIsUsable($promoCodeId) ? null : PromoCode::find($promoCodeId);

        $shopOrderRepo = new ShopOrderRepository($shop);
        $order = $shopOrderRepo->create($products, $deliveryLatitude, $deliveryLongitude, $source, $type, null, $isPayed, $additionalNote, $promoCode);

        OrderAction::dispatch($order->id);

        return Resource::jsonResponse($order);
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

    // TODO: edit order

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

    /**
     * @param int                      $orderId
     * @param OrderIsPayedUpdateRequest $request
     *
     * @return OrderResource
     */
    public function updateIsPayed($orderId, OrderIsPayedUpdateRequest $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');

        /** @var Order $order */
        $order = $shop->orders()->findOrFail($orderId);

        $isPayed = $request->input('is_payed');
        $orderRepo = new OrderRepository($order);
        $orderRepo->updateIsPayed($isPayed);

        OrderAction::dispatch($order->id);

        return (new OrderResource($order));
    }
}
