<?php

namespace App\Http\Controllers\Shop;

use App\Events\OrderEvent;
use App\Exceptions\OrderException;
use App\Http\Requests\Shop\Order\OrderByDateRequest;
use App\Http\Requests\Shop\Order\OrderIsPayedUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\OptionResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ShopUserResource;
use App\Models\Order;
use App\Models\Client;
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

use App\Repositories\ShopStatisticsRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param OrderByDateRequest $request
     *
     * @return JsonResponse
     */
    public function current(OrderByDateRequest $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $shopRepository = new ShopRepository($shop);

        $dateTime = $request->input('date_time', date('d-m-Y H:i'));

        $orders = $shopRepository->orders($dateTime);

        return ResourceCollection::jsonResponse($orders);
    }

    /**
     * @param OrderByDateRequest $request
     *
     * @return JsonResponse
     */
    public function report(OrderByDateRequest $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $shopStatisticsRepository = new ShopStatisticsRepository($shop);

        $dateTime = $request->input('date_time', date('d-m-Y H:i'));

        // TODO: extract to seperate model
        $report = $shopStatisticsRepository->ordersReportForDateTime($dateTime);

        return new JsonResponse([ 'data' => [
            'count'                 => $report['count'],
            'countYesterday'        => $report['countYesterday'],
            'countAvgThisWeek'      => $report['countAvgThisWeek'],
            'countAvgLastWeek'      => $report['countAvgLastWeek'],
            'countAvgThisMonth'     => $report['countAvgThisMonth'],
            'countAvgLastMonth'     => $report['countAvgLastMonth'],
            'countLastWeekSameDay'  => $report['countLastWeekSameDay'],
            'countLastMonthSameDay' => $report['countLastMonthSameDay'],

            'ordersTime'                 => $report['ordersTime'],
            'ordersHours'                => $report['ordersHours'],
            'categoriesTime'             => $report['categoriesTime'],
            'ordersYesterdayHours'       => $report['ordersYesterdayHours'],
            'ordersLastWeekSameDayHours' => $report['ordersLastWeekSameDayHours'],

            'ingredients'  => $report['ingredients'],
            'options'      => OptionResource::collection($report['options']),
            'products'     => ProductResource::collection($report['products']),
            'countType'    => $report['countType'],
            'categories'   => CategoryResource::collection($report['categories']),
            'countStatus'  => $report['countStatus'],
            'countSource'  => $report['countSource'],
            'transporters' => ShopUserResource::collection($report['transporters']),
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
            ->findOrFail($orderId);

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
        $type              = $request->input('type', false);
        $source            = $request->input('source', false);
        $isPayed           = $request->input('is_payed', false);
        $products          = $request->input('products');
        $promoCodeId       = $request->input('promo_code_id', null);
        $deliveryFee       = $request->input('delivery_fee', null);
        $additionalNote    = $request->input('additional_note', null);
        $associatedPhone   = $request->input('associated_phone', null);
// TODO: remove delivery coordinates
        $deliveryLatitude  = $request->input('delivery_latitude', null);
        $deliveryLongitude = $request->input('delivery_longitude', null);

        $client = Client::wherePhone($associatedPhone)->first();

        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var PromoCode $promoCode */
        $promoCode = PromoCode::whereIsUsable()->find($promoCodeId);

        $shopOrderRepo = new ShopOrderRepository($shop);
// TODO: make order status as accepted because it was created by shop users
        $order = $shopOrderRepo->create($products, $deliveryLatitude, $deliveryLongitude, $source, $type, $associatedPhone, $client, $isPayed, $deliveryFee, $additionalNote, $promoCode);

        OrderEvent::dispatch($order->id);

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
        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var Order $order */
        $order = $shop->orders()->findOrFail($orderId);

        $type              = $request->input('type', false);
        $source            = $request->input('source', false);
        $isPayed           = $request->input('is_payed', false);
        $products          = $request->input('products');
        $promoCodeId       = $request->input('promo_code_id', null);
        $deliveryFee       = $request->input('delivery_fee', null);
        $additionalNote    = $request->input('additional_note', null);
        $associatedPhone   = $request->input('associated_phone', null);
        $deliveryLatitude  = $request->input('delivery_latitude', $order->delivery_latitude);
        $deliveryLongitude = $request->input('delivery_longitude', $order->delivery_longitude);

        $client = null;
        if ($associatedPhone !== $order->associated_phone) {
            $client = Client::wherePhone($associatedPhone)->first();
        }

        /** @var PromoCode $promoCode */
        $promoCode = PromoCode::whereIsUsable($order->id)->find($promoCodeId);

        $shopOrderRepo = new ShopOrderRepository($shop);
        $order = $shopOrderRepo->update($order, $products, $deliveryLatitude, $deliveryLongitude, $source, $type, $associatedPhone, $client, $isPayed, $deliveryFee, $additionalNote, $promoCode);

        OrderEvent::dispatch($order->id);

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

        $shopTransporterId = $request->input('transporter_id', null);
        /** @var ShopUser $shopTransporter */
        $shopTransporter = null;
        if ($shopTransporterId) {
            $shopTransporter = $shop->shopTransporters()->findOrFail($shopTransporterId);
        }

        $orderRepo = new OrderRepository($order);
        $orderRepo->attachShopTransporter($shopTransporter);

        OrderEvent::dispatch($order->id);

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

        OrderEvent::dispatch($order->id);

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

        OrderEvent::dispatch($order->id);

        return (new OrderResource($order));
    }
}
