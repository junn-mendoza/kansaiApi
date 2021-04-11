<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ColorSpecsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $color_details = $this->whenLoaded('color_details');
        return [
            'id' => $this->id,
            'alias' => $this->alias,
            'spec' => $this->spec,
            'color_details' => new ColorDetailsResource($color_details),
        ];
    }
}
