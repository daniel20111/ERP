<?php

namespace App\Http\Resources\ProductSale;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductSaleCollection extends ResourceCollection
{
    public static $wrap = 'product_sales';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
