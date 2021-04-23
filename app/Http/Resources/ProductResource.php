<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'type'        => $this->type,
            'photo'       => $this->photo,
            'price'       => $this->price,
            'description' => $this->getTranslations('description'),
            'category_id' => $this->category_id,
            'ingredient_categories' => IngredientCategoriesResource::collection($this->whenLoaded('ingredientCategories')),
            'product_count' => $this->whenPivotLoaded('order_product', function() {
                return $this->pivot->product_count;
            }),
        ];
    }
}
