<?php

namespace App\Http\Requests\Client;

use App\Models\Client;
use App\Models\PromoCodeShopItem;
use Illuminate\Foundation\Http\FormRequest;

class PromoCodeCreateRequest extends FormRequest
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
            'points'  => ['required', 'numeric',  function($attribute, $value, $fail) {
                $promoCodeShopItem = PromoCodeShopItem::where('points', '=', $value)->firstOrFail();
                $this->attributes->set('promoCodeShopItem', $promoCodeShopItem);

                /** @var Client $authClient */
                $authClient = auth()->user();
                if ($promoCodeShopItem->points > $authClient->loyalty_points_count) {
                    $fail('points.max');
                }
            }],
        ];
    }
}
