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
/*             'name_product' => $this->name_product,
            'image_product' => $this->image_product,
            'length_product' => $this->length_product,
            'height_product' => $this->height_product,
            'weight_product' => $this->weight_product,
            'units_box_product' => $this->units_box_product,
            'brand_product' => $this->brand_product,
            'origin_product' => $this->origin_product, */
            'model_product' => $this->model_product,
            'description_product' => $this->description_product,
            'url_image_product' => $this->url_image_product,
            'format_product' => $this->format_product,
            'code_product' => $this->code_product,
            'family_product' => $this->family_product,
            'finish_product' => $this->finish_product,
            'brand_product' => $this->brand_product,
            'origin_product' => $this->origin_product,
            'unit_measure_product' => $this->unit_measure_product,
            'units_box_product' => $this->units_box_product,
            'area_box_product' => $this->area_box_product,
            'boxes_pallet_product' => $this->boxes_pallet_product,
            'area_pallet_product' => $this->area_pallet_product,
            'weight_box_product' => $this->weight_box_product,
            'weight_pallet_product' => $this->weight_pallet_product,
        ];
    }
}
