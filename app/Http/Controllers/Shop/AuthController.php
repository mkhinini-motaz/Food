<?php

namespace App\Http\Controllers\Shop;

use App\Http\Resources\Resource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController as BaseAuthController;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function profile()
    {
        return Resource::jsonResponse(auth()->user());
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        return BaseAuthController::login('shop', $request);
    }
}
