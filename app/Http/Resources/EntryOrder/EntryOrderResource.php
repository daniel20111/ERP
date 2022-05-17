<?php

namespace App\Http\Resources\EntryOrder;

use App\Http\Resources\EntryOrderProduct\EntryOrderProductCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class EntryOrderResource extends JsonResource
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
            'code_entry_order' => $this->code_entry_order,
            'verified_entry_order' => $this->verified_entry_order,
            'error_entry_order' => $this->error_entry_order,

            'created_at' => $this->created_at,
            // 'entry_order_product' => new EntryOrderProductCollection($this->entry_order_products),
            'entry_order_product' => new EntryOrderProductCollection($this->whenLoaded('entry_order_products')),
        ];
    }
}
