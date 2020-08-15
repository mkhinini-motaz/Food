<?php

namespace App\Http\Controllers\Client;

use App\Http\Requests\Client\RegisterRequest;
use App\Http\Requests\Client\ProfileUpdateRequest;
use App\Model\Client;
use App\Repositories\ClientRepository;
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
        return response()->json([ 'status' => 'success', 'data' => auth()->user() ], 200);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'phone'    => 'required',
            'password' => 'required'
        ]);

        $phone       = preg_replace('#\s#', '', $request->get('phone'));
        $password    = $request->get('password');
        $credentials = compact('phone', 'password');

        if (! $token = auth('clients')->attempt($credentials)) {
            return response()->json([ 'error' => 'Unauthorized' ], 401);
        }

        $client = auth()->user(); // TODO: do shouldUse guard globally for folder
        $client->access_token = $token;

        return response()->json([ 'status' => 'success', 'data' => $client ], 200);
    }

    /**
     * @param RegisterRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $firstName = $request->input('first_name');
        $lastName  = $request->input('last_name');
        $email     = $request->input('email', null);
        $password  = $request->input('password');
        $phone     = $request->input('phone');
        $latitude  = $request->input('latitude', null);
        $longitude = $request->input('longitude', null);

        $client = ClientRepository::create($firstName, $lastName, $email, $password, $phone, $latitude, $longitude);
        $token = $client->createToken('client')->plainTextToken;

        return response()->json([ 'status' => 'success', 'access_token' => $token, 'data' => $client ], 200);
    }

    /**
     * @param ProfileUpdateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateProfile(ProfileUpdateRequest $request)
    {
        $firstName = $request->input('first_name', null);
        $lastName  = $request->input('last_name', null);
        $email     = $request->input('email', null);
        $password  = $request->input('password', null);
        $phone     = $request->input('phone', null);
        $latitude  = $request->input('latitude', null);
        $longitude = $request->input('longitude', null);

        $client = auth()->user();
        $clientRepository = new ClientRepository($client);
        $clientRepository->update($firstName, $lastName, $email, $password, $phone, $latitude, $longitude);

        return response()->json([ 'status' => 'success', 'data' => $client ], 200);
    }
}
