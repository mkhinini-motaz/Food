<?php

namespace App\Http\Controllers\Client;

use App\Events\ClientRegistered;
use App\Http\Requests\Client\PasswordUpdateRequest;
use App\Models\Client;
use App\Repositories\ClientRepository;
use App\Http\Requests\Client\RegisterRequest;
use App\Http\Requests\Client\ProfileUpdateRequest;
use App\Http\Resources\ClientResource;
use App\Http\Resources\Resource;
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
        /** @var Client $authClient */
        $authClient = auth()->user();
        if (! $authClient) {
            $authClient = new Client();
        }

        $authClient->load([ 'promoCodes' ]);
        $authClient->loadPlatformInfo();

        return (new ClientResource($authClient))->response();
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([ 'phone' => 'required', 'password' => 'required' ]);

        $phone       = preg_replace('#\s#', '', $request->get('phone'));
        $password    = $request->get('password');
        $credentials = compact('phone', 'password');

        if (! $token = auth('client')->attempt($credentials)) {
            return response()->json([ 'status' => 'error', 'message' => 'Unauthorized' ], 401);
        }

        /** @var Client $client */
        $client = auth('client')->user();
        $client->load([ 'promoCodes' ]);
        $client->loadPlatformInfo();
        $client->access_token = $token;

        return (new ClientResource($client))->response();
    }

    /**
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $phone      = $request->input('phone');
        $password   = $request->input('password');
        $lastName   = $request->input('last_name');
        $firstName  = $request->input('first_name');
        $inviteCode = $request->input('invite_code', null);

        $client = ClientRepository::create($firstName, $lastName, $password, $phone, true);
        ClientRegistered::dispatch($client, $inviteCode);
        $client->load([ 'promoCodes' ]);
        $client->loadPlatformInfo();

        $token = auth('client')->login($client);
        $client->access_token = $token;

        return (new ClientResource($client))->response();
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
        $lastName  = $request->input('last_name', null);
        $firstName = $request->input('first_name', null);

        /** @var Client $authClient */
        $authClient = auth()->user();
        $clientRepository = new ClientRepository($authClient);
        $clientRepository->update($firstName, $lastName, $email, $phone);

        $authClient->load([ 'promoCodes' ]);
        $authClient->loadPlatformInfo();

        return (new ClientResource($authClient))->response();
    }

    /**
     * @param PasswordUpdateRequest $request
     *
     * @return JsonResponse
     */
    public function updatePassword(PasswordUpdateRequest $request)
    {
        $password = $request->input('password', null);

        /** @var Client $client */
        $client = auth()->user();
        $clientRepository = new ClientRepository($client);
        $clientRepository->updatePassword($password);

        return Resource::jsonResponse($client);
    }

    /**
     * @param PasswordUpdateRequest $request
     *
     * @return JsonResponse
     */
    public function resetPassword(PasswordUpdateRequest $request)
    {
        $password = $request->input('password', null);

        /** @var Client $client */
        $client = auth()->user();
        $clientRepository = new ClientRepository($client);
        $clientRepository->updatePassword($password);

        return Resource::jsonResponse($client);
    }
}
