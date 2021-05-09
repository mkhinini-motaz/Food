<?php

namespace App\Http\Requests\Shop\Category;

use App\Models\ShopUser;
use Illuminate\Foundation\Http\FormRequest;

class MakeVisibleRequest extends FormRequest
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
            //
        ];
    }
}
