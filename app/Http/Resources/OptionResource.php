<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionResource extends JsonResource
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
            'photo'                  => $this->photo,

            'name'                   => $this->getTranslations('name'),
            'description'            => $this->getTranslations('description'),

            'count'       => $this->when($this->count, $this->count),
            'sum_price'   => $this->when($this->sum_price, $this->sum_price),

            'quantity'  => $this->whenPivotLoaded(
                'choice_option',
                function() { return $this->pivot->quantity; }
            ),

            'option_group_id'  => $this->whenPivotLoaded(
                'option_option_group',
                function() { return $this->pivot->option_group_id; }
            ),
            'order'  => $this->whenPivotLoaded(
                'option_option_group',
                function() { return $this->pivot->order; }
            ),
            'price'  => $this->when(
                $this->pivot,
                function() { return $this->pivot->price; }
            ),
            'is_selected_by_default'  => $this->whenPivotLoaded(
                'option_option_group',
                function() { return $this->pivot->is_selected_by_default; }
            ),
        ];
    }
}
