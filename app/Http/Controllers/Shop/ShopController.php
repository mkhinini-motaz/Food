<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\Shop\Shop\UpdateServiceAreaRequest;
use App\Http\Resources\Resource;
use App\Models\Shop;
use App\Http\Controllers\Controller;
use App\Repositories\ShopRepository;

use Illuminate\Http\JsonResponse;

class ShopController extends Controller
{
    /**
     * @param UpdateServiceAreaRequest $request
     *
     * @return JsonResponse
     */
    public function updateServiceArea(UpdateServiceAreaRequest $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $serviceArea = $request->input('service_area');

        $shopRepository = new ShopRepository($shop);
        $shopRepository->updateServiceArea($serviceArea);

        // TODO: activity log

        return Resource::jsonResponse($shop);
    }
}
