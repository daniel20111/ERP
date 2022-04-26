<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name_product,
            'image_url' => $this->image_product,
            'length' => $this->length_product,
            'height' => $this->height_product,
            'weight' => $this->weight_product,
            'units_box' => $this->units_box_product,
            'brand_product' => $this->brand_product,
            'origin_product' => $this->origin_product,
        ];
    }
}
