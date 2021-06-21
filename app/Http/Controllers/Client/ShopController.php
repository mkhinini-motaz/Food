<?php

namespace App\Http\Controllers\Client;

use App\Http\Resources\ResourceCollection;
use App\Http\Resources\ShopResource;
use App\Models\Shop;
use App\Repositories\ShopRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $page           = $request->input('page', 1);
        $perPage        = $request->input('perPage', 20);
        $orderBy        = $request->input('orderBy', 'created_at');
        $search         = $request->input('search', null);
        $orderDirection = $request->input('orderDirection', 'desc');

        $shops = ShopRepository::paginate($page, $perPage, $search, $orderBy, $orderDirection, Shop::IS_APPROVED_TRUE);

        return ResourceCollection::jsonResponse($shops);
    }

    /**
     * @param int $shopId
     *
     * @return JsonResponse
     */
    public function show($shopId)
    {
        $shop = Shop::where('is_approved', '=', Shop::IS_APPROVED_TRUE)->findOrFail($shopId);

        return (new ShopResource($shop))->response();
    }

    /**
     * @param int $shopId
     * @param Request $request
     *
     * @return JsonResponse
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

        $categories = $shopRepository->paginateCategories($page, $perPage, $search, $orderBy, $orderDirection);

        return ResourceCollection::jsonResponse($categories);
    }

    /**
     * @param int $shopId
     * @param Request $request
     *
     * @return JsonResponse
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

        return ResourceCollection::jsonResponse($products);
    }
}
