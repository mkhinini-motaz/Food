<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ServiceAreaResource extends JsonResource
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
            'name'         => $this->getTranslations('name'),
            'delivery_fee' => $this->delivery_fee,
            'service_fee'  => $this->service_fee,
            'area'         => $this->area,
            // TODO: concider adding center point
        ];
    }
}
