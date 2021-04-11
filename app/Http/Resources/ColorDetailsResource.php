<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ColorDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $colors = $this->whenLoaded('colors');

        return [
            'id' => $this->id,
            'title' => $this->title,          
            'colors' => new ColorResource($colors),
            'color_specs' => ColorSpecsResource::collection($this->whenLoaded('color_specs'))
     
        ];
    }
}
