<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use App\Repositories\PhoneValidationRepository;
use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
            'products' => [ 'array', function($attribute, $value, $fail) {
                foreach ($value as $index => $product) {
                    if (
                        ! isset($product['product_id']) ||
                        ! isset($product['ingredients'])
                    ) {
                        $fail('Entry on line ' . $index . ' not valid');
                        return;
                    }


                }
            }, ],
        ];
    }
}
