<?php

namespace App\Http\Controllers\Shop;

use App\Http\Requests\Shop\Category\MakeInVisibleRequest;
use App\Http\Requests\Shop\Category\MakeVisibleRequest;
use App\Http\Resources\Resource;
use App\Http\Resources\ResourceCollection;
use App\Models\ActivityLog;
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

        $categories = $shopRepository->paginateCategories($page, $perPage, $search, $orderBy, $orderDirection, false);

        return ResourceCollection::jsonResponse($categories);
    }

    /**
     * @param int     $categoryId
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

        $products = $categoryRepository->paginateProducts($page, $perPage, $search, $orderBy, $orderDirection, false);

        return ResourceCollection::jsonResponse($products);
    }

    /**
     * @param int                $categoryId
     * @param MakeVisibleRequest $request
     *
     * @return JsonResponse
     */
    public function makeVisible($categoryId, MakeVisibleRequest $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var Category $category */
        $category = $shop->categories()->findOrFail($categoryId);

        $categoryRepository = new CategoryRepository($category);
        $categoryRepository->makeVisible();

        activity()->performedOn($category)
            ->causedBy(auth()->user())
            ->log(ActivityLog::DESCRIPTION_CATEGORY_MAKE_VISIBLE);

        return Resource::jsonResponse($category);
    }

    /**
     * @param int                  $categoryId
     * @param MakeInVisibleRequest $request
     *
     * @return JsonResponse
     */
    public function makeInvisible($categoryId, MakeInVisibleRequest $request)
    {
        /** @var Shop $shop */
        $shop = $request->get('shop');
        /** @var Category $category */
        $category = $shop->categories()->findOrFail($categoryId);

        $categoryRepository = new CategoryRepository($category);
        $categoryRepository->makeInvisible();

        activity()->performedOn($category)
            ->causedBy(auth()->user())
            ->log(ActivityLog::DESCRIPTION_CATEGORY_MAKE_INVISIBLE);

        return Resource::jsonResponse($category);
    }
}
