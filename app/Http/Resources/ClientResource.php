<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
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
            'id'                   => $this->id,
            'email'                => $this->email,
            'phone'                => $this->phone,
            'first_name'           => $this->first_name,
            'last_name'            => $this->last_name,
            'invite_code'          => $this->invite_code,
            'last_login_at'        => $this->last_login_at,
            'loyalty_points_count' => $this->loyalty_points_count,

            'promoCodes' => PromoCodeResource::collection($this->whenLoaded('promoCodes')),

            $this->mergeWhen($this->shops, function() {
                return [ 'shops' => $this->shops ];
            }),

            $this->mergeWhen($this->access_token, function() {
                return [ 'access_token' => $this->access_token ];
            }),
        ];
    }
}
