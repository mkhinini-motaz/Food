<?php

namespace App\Http\Requests\Client;

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
// TODO: handle facebook auth case

        $phoneCode = $this->request->get('phone_code');
        return [
            'first_name' => 'required|max:190',
            'last_name'  => 'required|max:190',
            'email'      => 'unique:clients,email|max:190',
            'password'   => 'required|confirmed|max:190',
            'latitude'   => 'required_with:longitude|numeric|between:-90,90',
            'longitude'  => 'required_with:latitude|numeric|between:-180,180',
            'phone_code' => 'required_with:phone|max:10',
            'phone'      => [
                'required',
                'max:50',
                'unique:clients,phone',
                'regex:/^(00|\+)2 *1 *6 *[234579] *([0-9] *){7}$/',
                function($attribute, $value, $fail) use ($phoneCode) {
                    if (PhoneValidationRepository::isNotValid($value, $phoneCode)) {
                        $fail('phone.code');
                    }
                }
            ],
        ];
    }
}
