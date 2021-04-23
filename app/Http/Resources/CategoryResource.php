<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'description' => $this->getTranslations('description'),
            'products'    => ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
