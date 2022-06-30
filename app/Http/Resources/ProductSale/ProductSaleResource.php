<?php

namespace App\Http\Resources\ProductSale;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductSaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->when($this->id != null, $this->id),
            'unit_price' => $this->when($this->unit_price != null, $this->unit_price),
            'quantity' => $this->when($this->quantity != null, $this->quantity),
            'total_price' => $this->when($this->total_price != null, $this->total_price),
            'sale_id' => $this->when($this->sale_id != null, $this->sale_id),
            'product_id' => $this->when($this->product_id != null, $this->product_id),
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
