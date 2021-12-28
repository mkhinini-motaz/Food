<?php

namespace App\Http\Resources;

use App\Models\ShopUser;

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
        $canSeeIsVisible = auth()->user() instanceof ShopUser;
        return [
            'id'          => $this->id,
            'type'        => $this->type,
            'photo'       => $this->photo,
            'price'       => $this->price,
            'category_id' => $this->category_id,
            'added_loyalty_points' => $this->added_loyalty_points,

            'description' => $this->getTranslations('description'),
            'name'        => $this->getTranslations('name'),

            'option_groups' => OptionGroupsResource::collection($this->whenLoaded('optionGroups')),

            'category'      => $this->whenLoaded('category'),
            'product_count' => $this->when($this->product_count, $this->product_count),

            $this->mergeWhen($canSeeIsVisible, function() {
                return [ 'is_visible' => $this->is_visible ];
            }),
        ];
    }
}
