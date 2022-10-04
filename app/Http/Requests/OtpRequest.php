<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtpRequest extends FormRequest
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
        return [
            'lang'  => 'in:en,fr,ar,tnfr,tnar',
            'phone' => [ 'required', 'max:50', 'regex:/^(00|\+)2 *1 *6 *[234579] *([0-9] *){7}$/' ],
        ];
    }
}
