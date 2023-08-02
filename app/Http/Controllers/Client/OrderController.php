<?php

namespace App\Http\Controllers\Client;

use App\Events\OrderEvent;
use App\Exceptions\SmsServiceNotAvailableException;
use App\Http\Resources\Resource;
use App\Http\Resources\ResourceCollection;
use App\Models\Order;
use App\Models\Shop;
use App\Models\PromoCode;
use App\Exceptions\OrderException;
use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use App\Repositories\ShopOrderRepository;
use App\Http\Requests\Client\OrderCreateRequest;

use App\Support\SmsSender;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use function App\Support\Helpers\deliveryFeeForPosition;

class OrderController extends Controller
{

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $clientRepository = new ClientRepository(auth()->user());

        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 50);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');

        $orders = $clientRepository->paginateOrders($page, $perPage, $orderBy, $orderDirection);

        return ResourceCollection::jsonResponse($orders);
    }

    /**
     * @param OrderCreateRequest $request
     *
     * @param SmsSender          $smsSender
     *
     * @return JsonResponse
     * @throws OrderException
     * @throws \Throwable
     */
    public function create(OrderCreateRequest $request, SmsSender $smsSender)
    {
        $type              = $request->input('type', null);
        $products          = $request->input('products');
        $promoCodeId       = $request->input('promo_code_id', null);
        $additionalNote    = $request->input('additional_note', null);
        $deliveryLatitude  = $request->input('delivery_latitude', null);
        $deliveryLongitude = $request->input('delivery_longitude', null);

        $deliveryFee = $type == Order::TYPE_DELIVERY ? deliveryFeeForPosition($deliveryLatitude, $deliveryLongitude) : null;

        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var PromoCode $promoCode */
// TODO: duplicate db query in
        $promoCode = PromoCode::whereIsUsable()->find($promoCodeId);

        $shopOrderRepo = new ShopOrderRepository($shop);
        $order = $shopOrderRepo->create($products, $deliveryLatitude, $deliveryLongitude, Order::SOURCE_ONLINE, $type, auth()->user()->phone, auth()->user(), false, $deliveryFee, $additionalNote, $promoCode);

        OrderEvent::dispatch($order->id);

        $message = 'Order : ' . substr((string) $order->id, -2) . ' - ' .
            date('H:i', $order->created_at + 3600); // TODO: temporary fix for lack of timezone support
        try {
            $smsSender->sendMessage('+21628852800', $message); // TODO: temporary until push notification is implemented
        } catch (SmsServiceNotAvailableException $exception) {
            \Log::error('SmsServiceNotAvailableException');
        }

        return Resource::jsonResponse($order);
    }

    /**
     * @param int     $shopId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function deliveryCost($shopId, Request $request)
    {
        /** @var Shop $shop */
        $shop          = Shop::findOrFail($shopId);
        $shopOrderRepo = new ShopOrderRepository($shop);

        $latitude  = $request->input('latitude');
        $longitude = $request->input('longitude');

        $deliveryCost = $shopOrderRepo->deliveryCost($latitude, $longitude);

        return response()->json([ 'data' => $deliveryCost ], 200);
    }
}
