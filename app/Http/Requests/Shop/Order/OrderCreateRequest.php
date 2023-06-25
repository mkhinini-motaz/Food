<?php

namespace App\Http\Requests\Shop\Order;

use App\Models\Order;
use App\Models\Shop;
use App\Models\PromoCode;
use App\Models\ShopUser;
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
        return auth()->user() instanceof ShopUser;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
// TODO: everything is duplicated in client/orderCreateRequest except shop fetching
    public function rules()
    {
        /** @var Shop $shop */
        $shop = Shop::isApproved()->findOrFail(auth()->user()->shop_id);
        $this->attributes->set('shop', $shop);

        // TODO: max products count
        // TODO: max products value

        return [
            'associated_phone' => [ 'max:50', 'regex:/^(00|\+)2 *1 *6 *[234579] *([0-9] *){7}$/' ],
            'additional_note'  => [ 'max:190' ],
            'delivery_fee'  => [ 'integer', 'min:0', 'max:20000' ],

            'source'   => [ 'required', 'in:' . implode(',', Order::SOURCES) ],
            'type'     => [ 'required', 'in:' . implode(',', Order::TYPES) ],
            'is_payed' => [ 'integer', 'min:0', 'max:1' ],

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

            'promo_code_id' => 'integer',

            // TODO: handle to_be_delivered_at case
        ];
    }
}
