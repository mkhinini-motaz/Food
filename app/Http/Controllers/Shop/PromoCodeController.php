<?php

namespace App\Http\Controllers\Shop;

use App\Models\Client;
use App\Models\PromoCode;
use App\Http\Controllers\Controller;
use App\Repositories\ClientRepository;
use App\Http\Resources\Resource;
use App\Http\Requests\Client\PromoCodeCreateRequest;

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
