<?php

namespace App\Http\Resources;

use App\Models\ShopUser;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
        $canSeeIsVisible = auth()->user() instanceof ShopUser;
        return [
            'id'            => $this->id,
            'product_count' => $this->product_count,
            'product_id'    => $this->product_id,

            'product'        => new ProductResource($this->whenLoaded('product')),
            'options'        => $this->when($this->options, OptionResource::collection($this->options)),
            'options_str'    => $this->when($this->options, $this->optionsPrintableForm(', ', '')),
        ];
    }
}
