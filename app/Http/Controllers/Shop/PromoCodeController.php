<?php

namespace App\Http\Controllers\Shop;

use App\Models\Client;
use App\Models\PromoCode;
use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use App\Http\Resources\Resource;
use App\Http\Requests\Client\PromoCodeCreateRequest;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PromoCodeController extends Controller
{
    /**
     * @param string  $code
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function show($code, Request $request)
    {
        $excludedOrderId = (int) $request->input('excluded_order_id', 'null');
        \Log::info(['qsldfjkqsldk', $excludedOrderId]);
        $code      = strtolower($code);
        $promoCode = PromoCode::whereCodeIsUsable($code, $excludedOrderId)
            ->firstOrFail();

        return Resource::jsonResponse($promoCode);
    }
}
