<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IngredientsResource extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->getTranslations('name'),
            'photo'       => $this->photo,
            'price'       => $this->price,
            'quantity'    => $this->quantity,
            'description' => $this->getTranslations('description'),
        ];
    }
}
