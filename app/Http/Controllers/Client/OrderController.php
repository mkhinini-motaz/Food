<?php

namespace App\Http\Controllers\Client;

use App\Events\OrderAction;
use App\Http\Resources\Resource;
use App\Models\Order;
use App\Models\Shop;
use App\Models\PromoCode;
use App\Exceptions\OrderException;
use App\Http\Controllers\Controller;
use App\Repositories\ShopOrderRepository;
use App\Http\Requests\Client\OrderCreateRequest;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param OrderCreateRequest $request
     *
     * @return JsonResponse
     * @throws OrderException
     */
    public function create(OrderCreateRequest $request)
    {
        $products          = $request->input('products');
        $promoCodeId       = $request->input('promo_code_id', null);
        $additionalNote    = $request->input('additional_note', null);
        $deliveryLatitude  = $request->input('delivery_latitude');
        $deliveryLongitude = $request->input('delivery_longitude');

        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var PromoCode $promoCode */
// TODO: duplicate db query
        $promoCode = ! $promoCodeId || ! PromoCode::promoCodeExistsAndIsUsable($promoCodeId) ? null : PromoCode::find($promoCodeId);

        $shopOrderRepo = new ShopOrderRepository($shop);
        $order = $shopOrderRepo->create($products, $deliveryLatitude, $deliveryLongitude, Order::SOURCE_ONLINE, Order::TYPE_DELIVERY, auth()->user(), $additionalNote, $promoCode);

        OrderAction::dispatch($order->id);

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
