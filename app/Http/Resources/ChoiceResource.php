<?php

namespace App\Http\Resources;

use App\Models\Choice;
use App\Models\ShopUser;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ChoiceResource
 * @package App\Http\Resources
 * @mixin Choice
 */
class ChoiceResource extends JsonResource
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
            'id'            => $this->id,
            'product_count' => $this->product_count,
            'product_id'    => $this->product_id,

            'product'        => new ProductResource($this->whenLoaded('product', function() {
                $this->product->price = $this->product_price;
                return $this->product;
            })),
            'options'        => $this->when($this->options, OptionResource::collection($this->options)),
            'options_str'    => $this->when($this->options, $this->optionsPrintableForm(', ', '')),
        ];
    }
}
