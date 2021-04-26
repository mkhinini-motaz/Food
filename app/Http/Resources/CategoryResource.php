<?php

namespace App\Http\Resources;

use App\Models\ShopUser;

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
        $canSeeIsVisible = auth()->user() instanceof ShopUser;
        return [
            'id'          => $this->id,
            'name'        => $this->getTranslations('name'),
            'photo'       => $this->photo,
            'description' => $this->getTranslations('description'),
            'products'    => ProductResource::collection($this->whenLoaded('products')),
            $this->mergeWhen($canSeeIsVisible, function() {
                return [ 'is_visible' => $this->is_visible ];
            }),
        ];
    }
}
