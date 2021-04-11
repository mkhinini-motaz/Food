<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function order()
    {
        // TODO: implement

        return response()->json([ 'status' => 'success', 'data' => [] ], 200);
    }
}
