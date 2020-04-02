<?php

namespace App\Http\Controllers;

use App\Repositories\PhoneValidationRepository;
use App\Support\AwsSnsClient;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function validatePhone(Request $request)
    {
        $phone = $request->input('phone');
        $lang = $request->input('lang', 'fr');
        $randomStr = '';
        for ($i = 1; $i <= 6; $i++) {
            $randomStr .= rand(0, 9);
        }

        \Validator::validate(
            [ 'phone' => $phone, 'lang' => $lang ],
            [
                'phone' => [ 'required', 'max:50', 'regex:/^(00|\+)2 *1 *6 *[234579] *([0-9] *){7}$/' ],
                'lang' => 'max:2|in:en,fr,tn,ar'
            ]
        );

        PhoneValidationRepository::create($phone, $randomStr);
        AwsSnsClient::sendMessage($phone, trans('phone:validation_code', [ 'code' => $randomStr ], $lang));

        // TODO: handle aws error response

        return response()->json([ 'status' => 'success' ], 200);
    }
}
