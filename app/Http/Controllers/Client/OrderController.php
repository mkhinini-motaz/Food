<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Exceptions\OrderException;
use App\Models\Order;
use App\Models\PromoCode;
use App\Repositories\ShopOrderRepository;
use App\Http\Requests\Client\OrderCreateRequest;
use App\Models\Shop;

use Illuminate\Http\JsonResponse;

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
        $promoCode = ! $promoCodeId ? null : $shop->usablePromoCodes()->findOrFail($promoCodeId);

        $shopOrderRepo = new ShopOrderRepository($shop);
        $order = $shopOrderRepo->create(auth()->user(), $products, $deliveryLatitude, $deliveryLongitude, Order::SOURCE_ONLINE, Order::COLLECTION_METHOD_DELIVER, $additionalNote, $promoCode);

        return response()->json([ 'status' => 'success', 'data' => $order ], 200);
    }
}
