<?php

namespace App\Http\Resources;

use App\Models\Order;
use App\Models\ShopUser;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id'                 => $this->id,
            'type'               => $this->type,
            'source'             => $this->source,
            'status'             => $this->status,
            'is_payed'           => $this->is_payed,
            'total_price'        => $this->total_price,
            'associated_phone'   => $this->associated_phone,
            'delivery_latitude'  => $this->delivery_latitude,
            'delivery_longitude' => $this->delivery_longitude,
            'delivery_fee'       => $this->delivery_fee,
            'created_at'         => $this->created_at,

            'additional_note'    => value(function() {
                if ($this->source === Order::SOURCE_ONLINE || auth()->user() instanceof ShopUser) {
                    return $this->additional_note;
                }
                return '';
            }),

            'shop_transporter'   => new ShopUserResource($this->whenLoaded('shopTransporter')),
            'promo_code'         => new PromoCodeResource($this->whenLoaded('promoCode')),
            'client'             => new ClientResource($this->whenLoaded('client')),

            'choices'  => ChoiceResource::collection($this->whenLoaded('choices')),
            'products' => ProductResource::collection($this->whenLoaded('products')),

            'loyalty_action' => $this->getLoyaltyAction(),
            'printable_form' => $this->when(
                $this->relationLoaded('choices'),
                $this->toString()
            ),
        ];
    }
}
