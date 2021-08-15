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
            'name'        => $this->getTranslations('name'),
            'type'        => $this->type,
            'photo'       => $this->photo,
            'price'       => $this->price,
            'description' => $this->getTranslations('description'),
            'category_id' => $this->category_id,
            'added_loyalty_points' => $this->added_loyalty_points,

            'option_groups' => OptionGroupsResource::collection($this->whenLoaded('optionGroups')),
            'product_count' => $this->whenPivotLoaded('order_product', function() {
                return $this->pivot->product_count;
            }),

            $this->mergeWhen($canSeeIsVisible, function() {
                return [ 'is_visible' => $this->is_visible ];
            }),
        ];
    }
}
