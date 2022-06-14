<?php

namespace App\Http\Resources\EntryOrderProduct;

use App\Http\Resources\Product\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EntryOrderProductResource extends JsonResource
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
            'entry_order_id' => $this->entry_order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'verified' => $this->verified,
            'error' => $this->error,

            'created_at' => $this->when($this->created_at != null, $this->created_at),
            'product' => $this->when($this->product != null, $this->product),
            'entry_order' => $this->when($this->entry_order != null, $this->entry_order),
        ];
    }
}
