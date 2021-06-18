<?php

namespace App\Http\Controllers\Client;

use App\Events\ClientRegistered;
use App\Http\Requests\Client\RegisterRequest;
use App\Http\Requests\Client\ProfileUpdateRequest;
use App\Models\Client;
use App\Models\Shop;
use App\Repositories\ClientRepository;
use App\Http\Controllers\Controller;

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
     * @param int     $shopId
     * @param Request $request
     * @return JsonResponse
     */
    public function login($shopId, Request $request)
    {
        $shop = Shop::where('is_approved', '=', Shop::IS_APPROVED_TRUE)->findOrFail($shopId);
        $request->validate([ 'phone' => 'required', 'password' => 'required' ]);

        $phone       = preg_replace('#\s#', '', $request->get('phone'));
        $password    = $request->get('password');
        $shop_id     = $shop->id;
        $credentials = compact('phone', 'password', 'shop_id');

        if (! $token = auth('client')->attempt($credentials)) {
            return response()->json([ 'status' => 'error', 'message' => 'Unauthorized' ], 401);
        }

        $client = auth('client')->user();
        $client->access_token = $token;

        return response()->json([ 'status' => 'success', 'data' => $client ], 200);
    }

    /**
     * @param int             $shopId
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register($shopId, RegisterRequest $request)
    {
        $shop = Shop::where('is_approved', '=', Shop::IS_APPROVED_TRUE)->findOrFail($shopId);

        $phone      = $request->input('phone');
        $password   = $request->input('password');
        $lastName   = $request->input('last_name');
        $firstName  = $request->input('first_name');
        $inviteCode = $request->input('invite_code', null);

        $client = ClientRepository::create($shop, $firstName, $lastName, $password, $phone, true);
        ClientRegistered::dispatch($client, $inviteCode);

        $token = auth('client')->login($client);
        $client->access_token = $token;

        return response()->json([ 'status' => 'success', 'data' => $client ], 200);
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
        $firstName = $request->input('first_name', null);

        /** @var Client $client */
        $client = auth()->user();
        $clientRepository = new ClientRepository($client);
        $clientRepository->update($firstName, $lastName, $email, $password, $phone);

        return response()->json([ 'status' => 'success', 'data' => $client ], 200);
    }
}
