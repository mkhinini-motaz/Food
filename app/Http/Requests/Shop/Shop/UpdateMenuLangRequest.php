<?php

namespace App\Http\Requests\Shop\Shop;

use App\Models\ShopUser;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuLangRequest extends FormRequest
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
            'menu_displayed_lang' => 'required', // TODO: value validation (fr|tn|...)
        ];
    }
}
