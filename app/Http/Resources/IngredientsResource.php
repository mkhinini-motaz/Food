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
            'id'                     => $this->id,
            'name'                   => $this->getTranslations('name'),
            'photo'                  => $this->photo,
            'quantity'               => $this->quantity,
            'description'            => $this->getTranslations('description'),

            'ingredient_category_id'  => $this->whenPivotLoaded(
                'ingredient_ingredient_category',
                function() { return $this->pivot->ingredient_category_id; }
            ),
            'order'  => $this->whenPivotLoaded(
                'ingredient_ingredient_category',
                function() { return $this->pivot->order; }
            ),
            'price'  => $this->whenPivotLoaded(
                'ingredient_ingredient_category',
                function() { return $this->pivot->price; }
            ),
            'is_by_default_selected'  => $this->whenPivotLoaded(
                'ingredient_ingredient_category',
                function() { return $this->pivot->is_by_default_selected; }
            ),
        ];
    }
}
