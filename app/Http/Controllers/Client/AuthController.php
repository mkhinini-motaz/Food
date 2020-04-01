<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function profile(Request $request)
    {
        // TODO: implement

        return response()->json([ 'status' => 'success', 'data' => [] ], 200);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        // TODO: implement

        return response()->json([ 'status' => 'success', 'data' => [] ], 200);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // TODO: implement

        return response()->json([ 'status' => 'success', 'data' => [] ], 200);
    }
}
