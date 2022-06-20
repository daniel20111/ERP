<?php

namespace App\Http\Resources\ProductQuotation;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductQuotationResource extends JsonResource
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
            'quantity' => $this->when($this->quantity != null, $this->quantity),
            'unit_price' => $this->when($this->unit_price != null, $this->unit_price),
            'total_price' => $this->when($this->total_price != null, $this->total_price),
            'quotation_id' => $this->when($this->quotation_id != null, $this->quotation_id),
            'product_id' => $this->when($this->product_id != null, $this->product_id),

            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
