<?php

namespace App\Http\Controllers\Client;

use App\Model\Category;
use App\Model\Shop;
use App\Repositories\CategoryRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CategoryController extends Controller
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

        $categories = CategoryRepository::paginate($page, $perPage, $search, $orderBy, $orderDirection, Shop::IS_APPROVED_TRUE);

        return response()->json([ 'status' => 'success', 'data' => $categories ], 200);
    }

    /**
     * @param int $categoryId
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function product($categoryId, Request $request)
    {
        $category = Category::findOrFail($categoryId, Shop::IS_APPROVED_TRUE);
        $categoryRepository = new CategoryRepository($category);

        $page = $request->input('page', null);
        $perPage = $request->input('perPage', null);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');
        $search = $request->input('search', null);

        $products = $categoryRepository->paginateProducts($page, $perPage, $search, $orderBy, $orderDirection);

        return response()->json([ 'status' => 'success', 'data' => $products ], 200);
    }

    /**
     * @param int $categoryId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($categoryId)
    {
        $category = Category::findOrFail($categoryId, Shop::IS_APPROVED_TRUE);

        return response()->json([ 'status' => 'success', 'data' => $category ], 200);
    }
}
