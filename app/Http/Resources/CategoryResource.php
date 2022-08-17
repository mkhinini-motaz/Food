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
        return [
            'id'          => $this->id,
            'photo'       => $this->photo,

            'name'        => $this->getTranslations('name'),
            'description' => $this->getTranslations('description'),

            'products'    => ProductResource::collection($this->whenLoaded('products')),

            'count'       => $this->when($this->count, $this->count),
            'sum_price'   => $this->when($this->sum_price, $this->sum_price),

            $this->mergeWhen(auth()->user() instanceof ShopUser, function() {
                return [ 'is_visible' => $this->is_visible ];
            }),
        ];
    }
}
