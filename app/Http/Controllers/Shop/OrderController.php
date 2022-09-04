<?php

namespace App\Http\Controllers\Shop;

use App\Events\OrderAction;
use App\Exceptions\OrderException;
use App\Http\Requests\Shop\Order\OrderCurrentRequest;
use App\Http\Requests\Shop\Order\OrderIsPayedUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\OptionResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\Resource;
use App\Http\Resources\ShopUserResource;
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
    public function current(OrderCurrentRequest $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $shopRepository = new ShopRepository($shop);

        $dateTime = $request->input('date_time', date('d-m-Y H:i'));

        $orders = $shopRepository->orders($dateTime);

        // TODO: extract to seperate model
        $report = $shopRepository->ordersReportForDateTime($dateTime);

        return new JsonResponse([ 'data' => [
            'orders' => OrderResource::collection($orders),
            'report' => [ // TODO: move to a seperate route
                'categories' => CategoryResource::collection($report['categories']),
                'products' => ProductResource::collection($report['products']),
                'options' => OptionResource::collection($report['options']),
                'countStatus' => $report['countStatus'],
                'count' => $report['count'],
                'countType' => $report['countType'],
                'transporters' => ShopUserResource::collection($report['transporters']),
            ],
        ] ]);
    }

    /**
     * @param int     $orderId
     * @param Request $request
     *
     * @return OrderResource
     */
    public function show($orderId, Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $order = $shop->orders()
            ->withNeededRelationsForProcessing()
            ->find($orderId);

        return (new OrderResource($order));
    }

    /**
     * @param OrderCreateRequest $request
     *
     * @return OrderResource
     * @throws OrderException
     */
    public function create(OrderCreateRequest $request)
    {
        // TODO: delivery fee

        $type              = $request->input('type', false);
        $source            = $request->input('source', false);
        $isPayed           = $request->input('is_payed', false);
        $products          = $request->input('products');
        $promoCodeId       = $request->input('promo_code_id', null);
        $additionalNote    = $request->input('additional_note', null);
        $associatedPhone   = $request->input('associated_phone', null);
        $deliveryLatitude  = $request->input('delivery_latitude', null);
        $deliveryLongitude = $request->input('delivery_longitude', null);
// TODO: client

        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var PromoCode $promoCode */
// TODO: refactor duplicate db query
        $promoCode = ! $promoCodeId || ! PromoCode::promoCodeExistsAndIsUsable($promoCodeId) ? null : PromoCode::find($promoCodeId);

        $shopOrderRepo = new ShopOrderRepository($shop);
        $order = $shopOrderRepo->create($products, $deliveryLatitude, $deliveryLongitude, $source, $type, $associatedPhone, null, $isPayed, $additionalNote, $promoCode);

        OrderAction::dispatch($order->id);

        return (new OrderResource($order));
    }

    /**
     * @param int                $orderId
     * @param OrderCreateRequest $request
     *
     * @return OrderResource
     * @throws OrderException
     * @throws \Throwable
     */
    public function update($orderId, OrderCreateRequest $request)
    {
        // TODO: delivery fee

        $type              = $request->input('type', false);
        $source            = $request->input('source', false);
        $isPayed           = $request->input('is_payed', false);
        $products          = $request->input('products');
        $promoCodeId       = $request->input('promo_code_id', null);
        $additionalNote    = $request->input('additional_note', null);
        $associatedPhone   = $request->input('associated_phone', null);
        $deliveryLatitude  = $request->input('delivery_latitude', null);
        $deliveryLongitude = $request->input('delivery_longitude', null);

        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var PromoCode $promoCode */
// TODO: refactor duplicate db query
        $promoCode = ! $promoCodeId || ! PromoCode::promoCodeExistsAndIsUsable($promoCodeId) ? null : PromoCode::find($promoCodeId);

        $shopOrderRepo = new ShopOrderRepository($shop);
        $order = $shopOrderRepo->update($orderId, $products, $deliveryLatitude, $deliveryLongitude, $source, $type, $associatedPhone, null, $isPayed, $additionalNote, $promoCode);

        OrderAction::dispatch($order->id);

        return (new OrderResource($order));
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
