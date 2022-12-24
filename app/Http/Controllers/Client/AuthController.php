<?php

namespace App\Http\Controllers\Client;

use App\Events\ClientRegistered;
use App\Http\Requests\Client\PasswordResetRequest;
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
        } else {
            $authClient->last_login_at = time();
            $authClient->save();
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
        $gender     = $request->input('gender');
        $password   = $request->input('password');
        $lastName   = $request->input('last_name');
        $firstName  = $request->input('first_name');
        $birthDate  = $request->input('birth_date');
        $inviteCode = $request->input('invite_code', null);

        $client = ClientRepository::createOrHydrateNonActive($firstName, $lastName, $birthDate, $gender, $password, $phone, true, $inviteCode);

        ClientRegistered::dispatch($client);

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
        $phone     = $request->input('phone', null);
        $gender    = $request->input('gender');
        $lastName  = $request->input('last_name', null);
        $firstName = $request->input('first_name', null);
        $birthDate = $request->input('birth_date');

        /** @var Client $authClient */
        $authClient = auth()->user();
        $clientRepository = new ClientRepository($authClient);
        $clientRepository->update($firstName, $lastName, $birthDate, $gender, $phone, true);

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
     * @param PasswordResetRequest $request
     *
     * @return JsonResponse
     */
    public function resetPassword(PasswordResetRequest $request)
    {
        $password = $request->get('password');
        $phone    = preg_replace('#\s#', '', $request->get('phone'));

        /** @var Client $client */
        $client = Client::where('phone', '=', $phone)->firstOrFail();
        $clientRepository = new ClientRepository($client);
        $clientRepository->updatePassword($password);

        $credentials = compact('phone', 'password');
        $token = auth('client')->attempt($credentials);
        $client->load([ 'promoCodes' ]);
        $client->loadPlatformInfo();
        $client->access_token = $token;

        return (new ClientResource($client))->response();
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function deviceId(Request $request)
    {
        $client = auth()->user();
        $client->device_id = $request->input('device_id');
        $client->save();

        return response()->json();
    }
}
