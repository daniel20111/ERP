<?php

namespace App\Http\Resources\Branch;

use App\Http\Resources\Warehouse\WarehouseCollection;
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
            'id' => $this->id,
            'name_branch' => $this->name_branch,
            'address_branch' => $this->address_branch,
            //'warehouses' => new WarehouseCollection($this->warehouses)
        ];
    }
}
