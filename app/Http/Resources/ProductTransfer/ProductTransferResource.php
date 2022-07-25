<?php

namespace App\Http\Resources\ProductTransfer;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductTransferResource extends JsonResource
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
            'id' => $this->when($this->id != null, $this->id),
            'product_id' => $this->when($this->product_id != null, $this->product_id),
            'transfer_id' => $this->when($this->transfer_id != null, $this->transfer_id),
            'quantity' => $this->when($this->quantity != null, $this->quantity),
            'allocated' => $this->allocated,
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
        //return parent::toArray($request);
    }
}
