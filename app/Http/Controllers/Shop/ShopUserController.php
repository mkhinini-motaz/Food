<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;

use App\Models\ShopUser;
use App\Repositories\ShopUserRepository;
use App\Http\Resources\ResourceCollection;
use App\Models\Shop;
use App\Repositories\ShopRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ShopUserController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function currentOrders(Request $request)
    {
        /** @var ShopUser $shopUser */
        $shopUser = auth()->user();
        $shopUserRepository = new ShopUserRepository($shopUser);

        $orders = $shopUserRepository->assignedOrders();
        $shopUser->load('shop');

        return ResourceCollection::jsonResponse($orders);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function transporter(Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $shopRepository = new ShopRepository($shop);

        $page    = $request->input('page', 1);
        $search  = $request->input('search', null);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');

        $shopUsers = $shopRepository->paginateTransporters($page, $perPage, $search, $orderBy, $orderDirection);

        return ResourceCollection::jsonResponse($shopUsers);
    }
}
