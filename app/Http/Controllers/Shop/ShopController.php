<?php

namespace App\Http\Controllers\Shop;

use App\Events\ShopMenuLangUpdated;
use App\Http\Requests\Shop\Shop\UpdateMenuLangRequest;
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
    // TODO: turn into update shop
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

    /**
     * @param UpdateMenuLangRequest $request
     *
     * @return JsonResponse
     */
    public function updateMenuLang(UpdateMenuLangRequest $request)
    {
        $menuDisplayedLang = $request->input('menu_displayed_lang');

        /** @var Shop $shop */
        $shop = $request->get('shop');
        $shopRepository = new ShopRepository($shop);
        $shopRepository->updateMenuDisplayedLang($menuDisplayedLang);

        ShopMenuLangUpdated::dispatch($shop->id);

        return Resource::jsonResponse($shop);
    }
}
