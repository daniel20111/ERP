<?php

namespace App\Http\Resources\Product;

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
            'id' => $this->id,
            'name_product' => $this->name_product,
            'image_product' => $this->image_product,
            'length_product' => $this->length_product,
            'height_product' => $this->height_product,
            'weight_product' => $this->weight_product,
            'units_box_product' => $this->units_box_product,
            'brand_product' => $this->brand_product,
            'origin_product' => $this->origin_product,
        ];
    }
}
