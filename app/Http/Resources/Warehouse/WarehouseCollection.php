<?php

namespace App\Http\Resources\Warehouse;

use Illuminate\Http\Resources\Json\ResourceCollection;

class WarehouseCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'warehouses';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
