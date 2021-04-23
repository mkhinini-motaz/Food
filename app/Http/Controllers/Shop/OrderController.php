<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Http\Resources\ResourceCollection;
use App\Models\Shop;
use App\Repositories\ShopRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function current(Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $shopRepository = new ShopRepository($shop);

        $page    = $request->input('page', 1);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');

        $orders = $shopRepository->paginateOrders($page, $perPage, null, $orderBy, $orderDirection, true);

        return ResourceCollection::jsonResponse($orders);
    }
}
