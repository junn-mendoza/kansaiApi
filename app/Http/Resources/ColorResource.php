<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ColorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'color_group' => $this->color_group,
            'color' => $this->color,
            'image' => $this->image,
            'image2' => $this->image2,
            'link' => $this->link,
            'pdf' => $this->pdf,
            'color_details' => ColorDetailsResource::collection($this->whenLoaded('color_details'))
        ];
    }
}
