<?php

namespace App\Http\Resources\Warehouse;

use App\Http\Resources\Section\SectionCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class WarehouseResource extends JsonResource
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
            'name_warehouse' => $this->name_warehouse,
            'sections' => new SectionCollection($this->whenLoaded('sections')),
        ];
    }
}
