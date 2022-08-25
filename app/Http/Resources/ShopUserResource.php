<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShopUserResource extends JsonResource
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
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'phone'      => $this->phone,
            'email'      => $this->email,
            'role'       => $this->role,
            'shop'       => new ShopResource($this->whenLoaded('shop')),

            $this->mergeWhen(isset($this->active_orders_count), function() {
                return [ 'active_orders_count' => $this->active_orders_count ];
            }),

            'orders' => OrderResource::collection($this->whenLoaded('orders')),
            'orders_count' => $this->when($this->orders_count, $this->orders_count),
            'orders_sum_total_price' => $this->when($this->orders_sum_total_price, $this->orders_sum_total_price),
        ];
    }
}
