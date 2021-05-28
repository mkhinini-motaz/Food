<?php

namespace App\Http\Controllers;

use App\Exceptions\SmsServiceNotAvailableException;
use App\Http\Requests\OtpRequest;
use App\Repositories\PhoneValidationRepository;
use App\Support\SmsSender;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use function App\Support\Helpers\generateOtp;

class AuthController extends Controller
{
    /**
     * @param OtpRequest $request
     * @param SmsSender $smsSender
     *
     * @return JsonResponse
     * @throws SmsServiceNotAvailableException
     */
    public function requestOtp(OtpRequest $request, SmsSender $smsSender)
    {
        $phone = $request->input('phone');
        $lang = $request->input('lang', 'fr');

        $randomStr = '';
        for ($i = 1; $i <= 6; $i++) {
            $randomStr .= rand(0, 9);
        }
        PhoneValidationRepository::create($phone, $randomStr);
        $smsSender->sendMessage($phone, trans('phone:validation_code', [ 'code' => $randomStr ], $lang));

        return response()->json([ 'status' => 'success' ], 200);
    }


    /**
     * @param string  $guard
     * @param Request $request
     *
     * @return JsonResponse
     */
    public static function login($guard, Request $request)
    {
        $request->validate([
            'phone'    => 'required',
            'password' => 'required'
        ]);

        $phone       = preg_replace('#\s#', '', $request->get('phone'));
        $password    = $request->get('password');
        $credentials = compact('phone', 'password');

        if (! $token = auth($guard)->attempt($credentials)) {
            return response()->json([ 'status' => 'error', 'message' => 'Unauthorized' ], 401);
        }

        $client = auth($guard)->user(); // TODO: do shouldUse guard globally for folder
        $client->access_token = $token;

        return response()->json([ 'status' => 'success', 'data' => $client ], 200);
    }
}
