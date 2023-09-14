<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\AuthController as BaseAuthController;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function profile(Request $request)
    {
        // TODO: admin ressource

        return response()->json([ 'status' => 'success', 'data' => auth()->user(), ], 200);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        return BaseAuthController::login('admin', $request);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function deviceId(Request $request)
    {
        $admin = auth()->user();
        $admin->device_id = $request->input('device_id');
        $admin->save();

        return response()->json();
    }
}
