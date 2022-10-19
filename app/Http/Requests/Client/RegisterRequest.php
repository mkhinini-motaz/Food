<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use App\Repositories\PhoneValidationRepository;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name'  => 'required|max:190',
            'last_name'   => 'required|max:190',
            'gender'      => 'required|in:' . implode(',', Client::GENDERS),
            'birth_date'  => 'required|date|date_format:d-m-Y', // TODO: set min date
            'password'    => 'required|confirmed|max:190',
            'otp'         => 'required|max:10',
            'invite_code' => 'max:190',
            'phone'       => [
                'required',
                'max:50',
                'regex:/^(00|\+)2 *1 *6 *[234579] *([0-9] *){7}$/',
                function($attribute, $value, $fail) use ($otp) {
                    if (Client::phoneIsActive($value)) {
                        $fail('phone.unique');
                        return;
                    }

                    if (PhoneValidationRepository::isNotValid($value, $otp)) {
                        $fail('phone.code');
                    }
                }
            ],
        ];
    }
}
