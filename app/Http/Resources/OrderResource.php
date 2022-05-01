<?php

namespace App\Http\Resources;

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
            'additional_note'    => $this->additional_note,
            'created_at'         => $this->created_at,

            'shop_transporter'   => new ShopUserResource($this->whenLoaded('shopTransporter')),
            'promo_code'         => new PromoCodeResource($this->whenLoaded('promoCode')),
            'client'             => new ClientResource($this->whenLoaded('client')),
            'products'           => $this->when($this->products, ProductResource::collection(collect($this->products))),
        ];
    }
}
