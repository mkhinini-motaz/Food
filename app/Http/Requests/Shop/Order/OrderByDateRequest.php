<?php

namespace App\Http\Requests\Shop\Order;

use App\Models\ShopUser;
use App\Models\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderByDateRequest extends FormRequest
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
            'date_time' => [ 'date', 'date_format:d-m-Y H:i' ],
        ];
    }
}
