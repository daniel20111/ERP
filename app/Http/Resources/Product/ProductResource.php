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
/*          'name_product' => $this->name_product,
            'image_product' => $this->image_product,
            'length_product' => $this->length_product,
            'height_product' => $this->height_product,
            'weight_product' => $this->weight_product,
            'units_box_product' => $this->units_box_product,
            'brand_product' => $this->brand_product,
            'origin_product' => $this->origin_product, */
            'model_product' => $this->when($this->model_product != null, $this->model_product),
            'description_product' => $this->when($this->description_product != null, $this->description_product),
            'url_image_product' => $this->when($this->url_image_product != null, $this->url_image_product),
            'format_product' => $this->when($this->format_product != null, $this->format_product),
            'code_product' => $this->when($this->code_product != null, $this->code_product),
            'family_product' => $this->when($this->family_product != null, $this->family_product),
            'finish_product' => $this->when($this->finish_product != null, $this->finish_product),
            'brand_product' => $this->when($this->brand_product != null, $this->brand_product),
            'origin_product' => $this->when($this->origin_product != null, $this->origin_product),
            'unit_measure_product' => $this->when($this->unit_measure_product != null, $this->unit_measure_product),
            'units_box_product' => $this->when($this->units_box_product != null, $this->units_box_product),
            'area_box_product' => $this->when($this->area_box_product != null, $this->area_box_product),
            'boxes_pallet_product' => $this->when($this->boxes_pallet_product != null, $this->boxes_pallet_product),
            'area_pallet_product' => $this->when($this->area_pallet_product != null, $this->area_pallet_product),
            'weight_box_product' => $this->when($this->weight_box_product != null, $this->weight_box_product),
            'weight_pallet_product' => $this->when($this->weight_pallet_product != null, $this->weight_pallet_product),

            'remain_units' => $this->when($this->remain_units != null, $this->remain_units),
            'reorder_point' => $this->when($this->reorder_point != null, $this->reorder_point),
            'price' => $this->when($this->price != null, $this->price),
            'sold_units' => $this->when($this->sold_units != null, $this->sold_units),

            // 'model_product' => $this->when($this->model_product != null, $this->model_product),
            // 'description_product' => $this->description_product,
            // 'url_image_product' => $this->url_image_product,
            // 'format_product' => $this->format_product,
            // 'code_product' => $this->code_product,
            // 'family_product' => $this->family_product,
            // 'finish_product' => $this->finish_product,
            // 'brand_product' => $this->brand_product,
            // 'origin_product' => $this->origin_product,
            // 'unit_measure_product' => $this->unit_measure_product,
            // 'units_box_product' => $this->units_box_product,
            // 'area_box_product' => $this->area_box_product,
            // 'boxes_pallet_product' => $this->boxes_pallet_product,
            // 'area_pallet_product' => $this->area_pallet_product,
            // 'weight_box_product' => $this->weight_box_product,
            // 'weight_pallet_product' => $this->weight_pallet_product,
        ];
    }
}
