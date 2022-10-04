<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use App\Models\Shop;
use App\Models\PromoCode;
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
        $shop = Shop::isApproved()->findOrFail(request()->route('shopId'));
        $this->attributes->set('shop', $shop);
        $deliveryLatitude  = request()->input('delivery_latitude');

        // TODO: max products count
        // TODO: max products value

        return [
            'additional_note'    => [ 'max:190' ],
            'delivery_latitude'  => [ 'required', 'between:-90,90' ],
            'delivery_longitude' => [ 'required', 'between:-180,180', function($attribute, $value, $fail) use ($deliveryLatitude, $shop) {
                if ($shop->locationNotWithinServiceArea($deliveryLatitude, $value)) {
                    $fail('delivery_latitude.location_not_served');
                    $fail('delivery_longitude.location_not_served');
                }
            } ],

            'products'                  => [ 'required', 'array' ],
            'products.*.product_id'     => [ 'required', 'integer' ],
            'products.*.product_count'  => [ 'required', 'integer' ],

            'products.*.options'            => [ 'array' ],
            'products.*.options.*.id'       => [ 'required', 'integer' ],
            'products.*.options.*.quantity' => [ function($attribute, $value, $fail) {
                if (! is_numeric($value) && $value !== null) {
                    $fail($attribute . '.integer_or_null');
                }
            } ],

            'promo_code_id' => [
                'integer',
                function($attribute, $value, $fail) use ($shop) {
                    if (PromoCode::promoCodeDoesntExistsOrIsNotUsable($value)) {
                        $fail('promo_code.exists');
                    }

                }
            ],
            // TODO: handle to_be_delivered_at case
            // TODO: accept order type
        ];
    }
}
