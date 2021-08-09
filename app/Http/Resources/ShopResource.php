<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'name'                  => $this->name,
            'service_area'          => $this->service_area,
            'promo_code_shop_items' => $this->promo_code_shop_items,

            'loyalty_points_count'  => $this->whenPivotLoaded(
                'client_shop',
                function() { return $this->pivot->loyalty_points_count; }
            ),
        ];
    }
}
