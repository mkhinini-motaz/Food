<?php

namespace App\Http\Controllers\Client;

use App\Models\ActivityLog;
use App\Models\Category;
use App\Models\Shop;
use App\Http\Resources\ResourceCollection;
use App\Repositories\CategoryRepository;
use App\Repositories\ShopRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * @param int $categoryId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function product($categoryId, Request $request)
    {
        // TODO: get from shop
        /** @var Category $category */
        $category = Category::where('is_visible', '=', 1)->findOrFail($categoryId);
        $categoryRepository = new CategoryRepository($category);

        $page    = $request->input('page', 1);
        $search  = $request->input('search', null);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');

        $products = $categoryRepository->paginateProducts($page, $perPage, $search, $orderBy, $orderDirection);

        activity()->performedOn($category)
            ->causedBy(auth()->user())
            ->tap(ActivityLog::tapShopId($category->shop_id))
            ->log(ActivityLog::DESCRIPTION_SHOW);

        return ResourceCollection::jsonResponse($products);
    }

    /**
     * @param int $categoryId
     *
     * @return JsonResponse
     */
    public function show($categoryId)
    {
        // TODO: category by shop
        $category = Category::findOrFail($categoryId, Shop::IS_APPROVED_TRUE);

        return response()->json([ 'status' => 'success', 'data' => $category ], 200); // TODO: ressource not working ????
    }

    /**
     * @param int $shopId
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function menu($shopId, Request $request)
    {
        $shop = Shop::where('is_approved', '=', Shop::IS_APPROVED_TRUE)->findOrFail($shopId);
        $shopRepository = new ShopRepository($shop);

        $categories = $shopRepository->paginateCategories(1, 30, null, 'order', 'asc');

        return ResourceCollection::jsonResponse($categories);
    }
}
