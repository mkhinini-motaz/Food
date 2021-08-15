<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OptionsResource extends JsonResource
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

            'option_group_id'  => $this->whenPivotLoaded(
                'option_option_group',
                function() { return $this->pivot->option_group_id; }
            ),
            'order'  => $this->whenPivotLoaded(
                'option_option_group',
                function() { return $this->pivot->order; }
            ),
            'price'  => $this->whenPivotLoaded(
                'option_option_group',
                function() { return $this->pivot->price; }
            ),
            'is_selected_by_default'  => $this->whenPivotLoaded(
                'option_option_group',
                function() { return $this->pivot->is_selected_by_default; }
            ),
        ];
    }
}
