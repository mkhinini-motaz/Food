<?php

namespace App\Http\Requests\Shop\Shop;

use App\Models\ShopUser;
use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceAreaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user() instanceof ShopUser;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service_area'     => 'required|array|min:3',
            'service_area.*'   => 'required|array|min:2|max:2',
            'service_area.*.0' => 'required|between:-90,90',
            'service_area.*.1' => 'required|between:-180,180',
        ];
    }
}
