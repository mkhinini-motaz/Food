<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Http\Requests\Client\OrderCreateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @param OrderCreateRequest $request
     *
     * @return JsonResponse
     */
    public function order(OrderCreateRequest $request)
    {
        // TODO: implement

        return response()->json([ 'status' => 'success', 'data' => [] ], 200);
    }
}
