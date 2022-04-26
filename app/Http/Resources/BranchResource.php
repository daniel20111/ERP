<?php

namespace App\Http\Resources;

use App\Models\Warehouse;
use Illuminate\Http\Resources\Json\JsonResource;

class BranchResource extends JsonResource
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
            'name' => $this->name_branch,
            'address' => $this->address_branch,
            'warehouses' => new WarehouseCollection($this->warehouses)
        ];
    }
}
