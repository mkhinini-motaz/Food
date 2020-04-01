<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;

use App\Model\Client;
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
        return response()->json([ 'status' => 'success', 'data' => $request->user() ], 200);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->get('email');
        $password = $request->get('password');


        $client = Client::where('email', $email)->first();

        if (!$client || !\Hash::check($password, $client->password)) {
            return response([
                'status' => 'error',
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        $token = $client->createToken('client')->plainTextToken;

        return response()->json([ 'status' => 'success', 'data' => $client, 'access_token' => $token ]);
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
