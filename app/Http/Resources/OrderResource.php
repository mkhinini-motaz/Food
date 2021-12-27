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
            'status'             => $this->status,
            'total_price'        => $this->total_price,
            'associated_phone'   => $this->associated_phone,
            'delivery_latitude'  => $this->delivery_latitude,
            'delivery_longitude' => $this->delivery_longitude,
            'additional_note'    => $this->additional_note,
            'source'             => $this->source,
            'collection_method'  => $this->collection_method,
            'created_at'         => $this->created_at,

            'shop_transporter'   => new ShopUserResource($this->whenLoaded('shopTransporter')),
            'promo_code'         => new PromoCodeResource($this->whenLoaded('promoCode')),
            'client'             => new ClientResource($this->whenLoaded('client')),
            'products'           => $this->when($this->products, ProductResource::collection($this->products)),
        ];
    }
}
