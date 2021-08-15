<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionGroupsResource extends JsonResource
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

            'options_are_billable'  => $this->whenPivotLoaded(
                'option_group_product',
                function() { return $this->pivot->options_are_billable; }
            ),
            'options_are_quantifiable'  => $this->whenPivotLoaded(
                'option_group_product',
                function() { return $this->pivot->options_are_quantifiable; }
            ),
            'max_options'   => $this->whenPivotLoaded(
                'option_group_product',
                function() { return $this->pivot->max_options; }
            ),
            'min_options'   => $this->whenPivotLoaded(
                'option_group_product',
                function() { return $this->pivot->min_options; }
            ),
            'order' => $this->whenPivotLoaded(
                'option_group_product',
                function() { return $this->pivot->order; }
            ),

            'options' => OptionsResource::collection($this->whenLoaded('options')),
        ];
    }
}
