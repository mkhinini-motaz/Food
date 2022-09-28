<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use App\Repositories\PhoneValidationRepository;
use Illuminate\Foundation\Http\FormRequest;

class PasswordResetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $otp = $this->request->get('otp');

        return [
            'otp'      => 'required|max:10',
            'password' => 'required|confirmed|max:190',
            'phone'    => [
                'max:50',
                'regex:/^(00|\+)2 *1 *6 *[234579] *([0-9] *){7}$/',
                function($attribute, $value, $fail) use ($otp) {
                    if (PhoneValidationRepository::isNotValid($value, $otp)) {
                        $fail('phone.code');
                    }
                }
            ],
        ];
    }
}
