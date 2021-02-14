<?php

namespace App\Http\Controllers\Client;

use App\Models\PromoCode;
use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;

class PromoCodeController extends Controller
{
    /**
     * @param int $code
     *
     * @return JsonResponse
     */
    public function show($code)
    {
        $code = strtolower($code);
        $promoCode = PromoCode::where('code', '=', $code)->firstOrFail();

        return response()->json([ 'status' => 'success', 'data' => $promoCode ], 200);
    }
}
