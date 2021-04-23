<?php

namespace App\Http\Controllers\Shop;

use App\Http\Resources\ResourceCollection;
use App\Models\Category;
use App\Models\Shop;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;

use App\Repositories\ShopRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    /**
     * @param int $shopId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $shopRepository = new ShopRepository($shop);

        $page    = $request->input('page', 1);
        $search  = $request->input('search', null);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');

        $categories = $shopRepository->paginateCategories($page, $perPage, $search, $orderBy, $orderDirection);

        return ResourceCollection::jsonResponse($categories);
    }

    /**
     * @param int     $categoryId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function show($categoryId, Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        $category = $shop->categories()->findOrFail($categoryId);

        return response()->json([ 'status' => 'success', 'data' => $category ], 200);
    }

    /**
     * @param int $categoryId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function product($categoryId, Request $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var Category $category */
        $category = $shop->categories()->findOrFail($categoryId);
        $categoryRepository = new CategoryRepository($category);

        $page    = $request->input('page', 1);
        $search  = $request->input('search', null);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');

        $products = $categoryRepository->paginateProducts($page, $perPage, $search, $orderBy, $orderDirection);

        return ResourceCollection::jsonResponse($products);
    }
}
