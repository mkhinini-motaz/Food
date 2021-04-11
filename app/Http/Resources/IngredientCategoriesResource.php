<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IngredientCategoriesResource extends JsonResource
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
            'pivot'       => $this->whenPivotLoaded('ingredient_category_product', $this->pivot),
            'ingredients' => IngredientsResource::collection($this->whenLoaded('ingredients')),
        ];
    }
}
