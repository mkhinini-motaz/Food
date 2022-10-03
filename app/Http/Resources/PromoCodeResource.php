<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromoCodeResource extends JsonResource
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
            'code'             => $this->code,
            'reduction_amount' => $this->reduction_amount,
            'is_usable'        => $this->is_usable,
            'expires_at'       => $this->expires_at,
            'created_at'       => $this->created_at,
        ];
    }
}
