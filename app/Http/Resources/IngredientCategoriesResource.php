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
            'description' => $this->getTranslations('description'),
            'photo'       => $this->photo,

            'ingredients_are_billable'  => $this->whenPivotLoaded(
                'ingredient_category_product',
                function() { return $this->pivot->ingredients_are_billable; }
            ),
            'ingredients_are_quantifiable'  => $this->whenPivotLoaded(
                'ingredient_category_product',
                function() { return $this->pivot->ingredients_are_quantifiable; }
            ),
            'max_ingredients'   => $this->whenPivotLoaded(
                'ingredient_category_product',
                function() { return $this->pivot->max_ingredients; }
            ),
            'min_ingredients'   => $this->whenPivotLoaded(
                'ingredient_category_product',
                function() { return $this->pivot->min_ingredients; }
            ),
            'order' => $this->whenPivotLoaded(
                'ingredient_category_product',
                function() { return $this->pivot->order; }
            ),

            'ingredients' => IngredientsResource::collection($this->whenLoaded('ingredients')),
        ];
    }
}
