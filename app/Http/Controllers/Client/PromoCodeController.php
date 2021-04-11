<?php

namespace App\Http\Controllers\Client;

use App\Http\Resources\Resource;
use App\Models\PromoCode;
use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;

class PromoCodeController extends Controller
{
    /**
     * @param string $code
     *
     * @return JsonResponse
     */
    public function show($code)
    {
        $code      = strtolower($code);
        $promoCode = PromoCode::where('code', '=', $code)->firstOrFail();

        return Resource::jsonResponse($promoCode);
    }
}
