<?php

namespace App\Http\Requests\Shop\Product;

use App\Models\ShopUser;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $photoUrl = $this->input('photo');
        $photoRules = 'required';
        if (strpos($photoUrl, '/tmp/') === 0) {
            $photoRules .= '|image|max:12000';
        }
        return [
            'name'        => 'required|translatable',
            'description' => 'required|translatable',
            'is_visible'  => 'required|in:0,1',
            'price'       => 'required|numeric',
            'photo'       => $photoRules,
        ];
    }
}
