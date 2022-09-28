<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use App\Repositories\PhoneValidationRepository;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user() instanceof Client;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $otp      = $this->request->get('otp');
        $phone    = $this->input('phone');
        $otpRules = ['max:10'];

        $phoneHasChanged = $phone !== auth()->user()->phone;
        if ($phoneHasChanged) {
            $otpRules[] = 'required';
        }

        return [
            'first_name' => 'max:190',
            'last_name'  => 'max:190',
            'email'      => 'unique:clients,email,' . auth()->user()->id . 'max:190',

            'otp'        => $otpRules,
            'phone'      => [
                'max:50',
                'unique:clients,phone,' . auth()->user()->id,
                'regex:/^(00|\+)2 *1 *6 *[234579] *([0-9] *){7}$/',
                function($attribute, $value, $fail) use ($otp, $phoneHasChanged) {
                    if ($phoneHasChanged && PhoneValidationRepository::isNotValid($value, $otp)) {
                        $fail('phone.code');
                    }
                }
            ],
        ];
    }
}
