<?php

namespace App\Http\Controllers\Client;

use App\Models\Shop;
use App\Repositories\ShopRepository;
use App\Http\Controllers\Controller;

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
        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');
        $search = $request->input('search', null);

        $shops = ShopRepository::paginate($page, $perPage, $search, $orderBy, $orderDirection, Shop::IS_APPROVED_TRUE);

        return response()->json([ 'status' => 'success', 'data' => $shops ], 200);
    }

    /**
     * @param int $shopId
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function category($shopId, Request $request)
    {
        $shop = Shop::where('is_approved', '=', Shop::IS_APPROVED_TRUE)->findOrFail($shopId);
        $shopRepository = new ShopRepository($shop);

        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');
        $search = $request->input('search', null);

        $products = $shopRepository->paginateCategories($page, $perPage, $search, $orderBy, $orderDirection);

        return response()->json([ 'status' => 'success', 'data' => $products ], 200);
    }

    /**
     * @param int $shopId
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function product($shopId, Request $request)
    {
        $shop = Shop::where('is_approved', '=', Shop::IS_APPROVED_TRUE)->findOrFail($shopId);
        $shopRepository = new ShopRepository($shop);

        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');
        $search = $request->input('search', null);
        $categoryIds = $request->input('category_ids', []);
        $productIds = $request->input('product_ids', []);

        $products = $shopRepository->paginateProducts($page, $perPage, $search, $orderBy, $orderDirection, $categoryIds, $productIds);

        return response()->json([ 'status' => 'success', 'data' => $products ], 200);
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
