<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Model\Shop;
use App\Repositories\ShopRepository;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $page = $request->input('page', null);
        $perPage = $request->input('perPage', null);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');
        $search = $request->input('search', null);

        $shops = ShopRepository::paginate($page, $perPage, $search, $orderBy, $orderDirection, Shop::IS_APPROVED_TRUE);

        return response()->json([ 'status' => 'success', 'data' => $shops ], 200);
    }

    /**
     * @param int $shopId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($shopId)
    {
        $shop = Shop::where('is_approved', '=', Shop::IS_APPROVED_TRUE)->findOrFail($shopId);

        return response()->json([ 'status' => 'success', 'data' => $shop ], 200);
    }
}
