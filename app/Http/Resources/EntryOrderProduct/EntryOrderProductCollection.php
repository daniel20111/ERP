<?php

namespace App\Http\Resources\EntryOrderProduct;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EntryOrderProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'product_entries';
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
