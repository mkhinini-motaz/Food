<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use App\Models\Shop;
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
        /** @var Shop $shop */
        $shop = request()->get('shop');

        // TODO: max products count
        // TODO: max products value

        return [
            'additional_note'    => [ 'max:190' ],
// TODO: location validation
//            'delivery_latitude'  => [ 'required', 'max:50' ],
//            'delivery_longitude' => [ 'required', 'max:50' ],

            'products'                  => [ 'required', 'array' ],
            'products.*.product_id'     => [ 'required', 'integer' ],
            'products.*.product_count'  => [ 'required', 'integer' ],

            'products.*.ingredients'            => [ 'array' ],
            'products.*.ingredients.*.id'       => [ 'required', 'integer' ],
            'products.*.ingredients.*.quantity' => [ function($attribute, $value, $fail) {
                if (! is_numeric($value) && $value !== null) {
                    $fail($attribute . '.integer_or_null');
                }
            } ],

            'promo_code_id' => [
                'integer',
                function($attribute, $value, $fail) use ($shop) {
                    if ($shop->promoCodeDoesntExistsOrIsNotUsable($value)) {
                        $fail('promo_code.exists');
                    }

                }
            ],
            // TODO: handle to_be_delivered_at case
        ];
    }
}
