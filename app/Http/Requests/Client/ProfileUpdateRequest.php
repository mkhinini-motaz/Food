<?php

namespace App\Http\Requests\Client;

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

        $phoneConfirmation = $this->request->get('phone_confirmation');
        return [
            'first_name' => 'max:190',
            'last_name'  => 'max:190',
            'email'      => 'unique:clients,email,' . auth()->user()->id . 'max:190',
            'password'   => 'confirmed|max:190',
            'latitude'   => 'required_with:longitude|numeric|between:-90,90|max:50',
            'longitude'  => 'required_with:latitude|numeric|between:-180,180|max:50',
            'phone_code' => 'required_with:phone|max:10',
            'phone'      => [
                'max:50',
                'unique:clients,phone,' . auth()->user()->id,
                'regex:/^(00|\+)2 *1 *6 *[234579] *([0-9] *){7}$/',
                function($attribute, $value, $fail) use ($phoneConfirmation) {
                    if (PhoneValidationRepository::isNotValid($value, $phoneConfirmation)) {
                        $fail('phone.code');
                    }
                }
            ],
        ];
    }
}
