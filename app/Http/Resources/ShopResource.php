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

            'description'           => $this->service->getTranslations('name'),
            'photo'                 => $this->service->photo,
            'menu_displayed_lang'   => $this->menu_displayed_lang,
        ];
    }
}
