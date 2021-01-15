<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\RegisterRequest;
use App\Http\Requests\Client\ProfileUpdateRequest;
use App\Repositories\ClientRepository;
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
        return response()->json([ 'status' => 'success', 'data' => auth()->user(), ], 200);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        return BaseAuthController::login('client', $request);
    }

    /**
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $email     = $request->input('email', null);
        $phone     = $request->input('phone');
        $password  = $request->input('password');
        $lastName  = $request->input('last_name');
        $latitude  = $request->input('latitude', null);
        $longitude = $request->input('longitude', null);
        $firstName = $request->input('first_name');

        $client = ClientRepository::create($firstName, $lastName, $email, $password, $phone, $latitude, $longitude);
        $token = auth('client')->login($client);

        return response()->json([ 'status' => 'success', 'access_token' => $token, 'data' => $client ], 200);
    }

    /**
     * @param ProfileUpdateRequest $request
     *
     * @return JsonResponse
     */
    public function updateProfile(ProfileUpdateRequest $request)
    {
        $email     = $request->input('email', null);
        $phone     = $request->input('phone', null);
        $password  = $request->input('password', null);
        $lastName  = $request->input('last_name', null);
        $latitude  = $request->input('latitude', null);
        $longitude = $request->input('longitude', null);
        $firstName = $request->input('first_name', null);

        $client = auth()->user();
        $clientRepository = new ClientRepository($client);
        $clientRepository->update($firstName, $lastName, $email, $password, $phone, $latitude, $longitude);

        return response()->json([ 'status' => 'success', 'data' => $client ], 200);
    }
}
