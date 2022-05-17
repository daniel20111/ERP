<?php

namespace App\Http\Resources\Entry;

use Illuminate\Http\Resources\Json\ResourceCollection;

class EntryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'entries';
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
