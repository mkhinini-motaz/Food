<?php

namespace App\Http\Requests\Client;

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

        return [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|unique:clients,email',
            'password'   => 'required|confirmed',
            'phone'      => [ 'regex:/^(00|\+)2 *1 *6 *[234579] *([0-9] *){7}$/' ],
// TODO: phone confirmation
            'latitude'   => 'required_with:longitude|numeric|between:-90,90',
            'longitude'  => 'required_with:latitude|numeric|between:-180,180',
        ];
    }
}
