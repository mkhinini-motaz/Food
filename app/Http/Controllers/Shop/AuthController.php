<?php

namespace App\Http\Controllers\Shop;

use App\Http\Resources\Resource;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController as BaseAuthController;

use App\Models\ShopUser;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function profile()
    {
        /** @var ShopUser $authUser */
        $authUser = auth()->user()->load('shop');
        return Resource::jsonResponse($authUser);
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
