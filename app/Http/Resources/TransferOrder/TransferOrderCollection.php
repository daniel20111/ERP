<?php

namespace App\Http\Resources\TransferOrder;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TransferOrderCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public static $wrap = 'transfer_orders';

    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
