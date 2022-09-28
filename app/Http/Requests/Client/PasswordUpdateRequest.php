<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (! (auth()->user() instanceof Client)) {
            return false;
        }

        $credentials = [
            'phone'    => auth()->user()->phone,
            'password' => $this->input('current_password'),
        ];

        return !! auth('client')->attempt($credentials);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'current_password' => 'required',
            'password'         => 'required|confirmed|max:190',
        ];
    }
}
