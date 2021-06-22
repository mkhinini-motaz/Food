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
        $deliveryLatitude  = request()->input('delivery_latitude');
        $deliveryLongitude = request()->input('delivery_longitude');

        // TODO: max products count
        // TODO: max products value

        return [
            'additional_note'    => [ 'max:190' ],
            'delivery_latitude'  => [ 'required', 'between:-90,90' ],
            'delivery_longitude' => [ 'required', 'between:-180,180', function($attribute, $value, $fail) use ($deliveryLatitude, $deliveryLongitude, $shop) {
                if ($shop->locationNotWithinServiceArea($deliveryLatitude, $deliveryLongitude)) {
                    $fail('delivery_latitude.location_not_served');
                    $fail('delivery_longitude.location_not_served');
                }
            } ],

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
