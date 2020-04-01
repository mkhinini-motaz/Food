<?php

namespace App\Http\Controllers\Admin;

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

        // TODO: implement

        return response()->json(['status' => 'success', 'data' => []], 200);
    }

    /**
     * @param int $categoryId
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function product($categoryId, Request $request)
    {
        $page = $request->input('page', null);
        $perPage = $request->input('perPage', null);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');
        $search = $request->input('search', null);

        // TODO: implement

        return response()->json(['status' => 'success', 'data' => []], 200);
    }

    /**
     * @param int $categoryId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($categoryId)
    {
        // TODO: implement

        return response()->json(['status' => 'success', 'data' => []], 200);
    }
}
