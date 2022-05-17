<?php

namespace App\Http\Resources\EntryOrder;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EntryOrderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'entry_orders';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
