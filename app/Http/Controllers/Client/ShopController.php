<?php

namespace App\Http\Controllers\Client;

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
        $page = $request->input('page', null);
        $perPage = $request->input('perPage', null);
        $orderBy = $request->input('orderBy', 'created_at');
        $orderDirection = $request->input('orderDirection', 'desc');
        $search = $request->input('search', null);

        // TODO: implement

        return response()->json(['status' => 'success', 'data' => []], 200);
    }

    /**
     * @param int $shopId
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($shopId)
    {
        // TODO: implement

        return response()->json(['status' => 'success', 'data' => []], 200);
    }
}
