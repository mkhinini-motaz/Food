<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function order()
    {
        // TODO: implement

        return response()->json(['status' => 'success', 'data' => []], 200);
    }
}
