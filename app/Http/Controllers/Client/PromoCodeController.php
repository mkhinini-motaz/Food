<?php

namespace App\Http\Controllers\Client;

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
        $promoCode = PromoCode::whereCodeIsUsable($code)
            ->firstOrFail();

        return Resource::jsonResponse($promoCode);
    }

    /**
     * @param PromoCodeCreateRequest $request
     *
     * @return JsonResponse
     */
    public function create(PromoCodeCreateRequest $request)
    {
        $promoCodeShopItem = $request->get('promoCodeShopItem');

        /** @var Client $authClient */
        $authClient = auth()->user();
        $clientRepo = new ClientRepository($authClient);

        $promoCode = $clientRepo->createPromoCode($promoCodeShopItem);

        return Resource::jsonResponse($promoCode);
    }
}
