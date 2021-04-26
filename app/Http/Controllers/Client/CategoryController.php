<?php

namespace App\Http\Controllers\Client;

use App\Http\Resources\Resource;
use App\Http\Resources\ResourceCollection;
use App\Models\Category;
use App\Models\Shop;
use App\Repositories\CategoryRepository;
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
        $category = Category::where('is_visible', '=', 1)->findOrFail($categoryId);
        $categoryRepository = new CategoryRepository($category);

        $page = $request->input('page', 1);
        $perPage = $request->input('perPage', 20);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');
        $search = $request->input('search', null);

        $products = $categoryRepository->paginateProducts($page, $perPage, $search, $orderBy, $orderDirection);

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
}
