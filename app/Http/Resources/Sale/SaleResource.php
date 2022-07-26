<?php

namespace App\Http\Resources\Sale;

use App\Http\Resources\ProductSale\ProductSaleCollection;
use App\Http\Resources\ProductSale\ProductSaleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SaleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->when($this->id != null, $this->id),
            'name_sale' => $this->when($this->name_sale != null, $this->name_sale),
            'nit_sale' => $this->when($this->nit_sale != null, $this->nit_sale),
            'total_sale' => $this->when($this->total_sale != null, $this->total_sale),
            'date_sale' => $this->when($this->date_sale != null, $this->date_sale),
            'user_id' => $this->when($this->user_id != null, $this->user_id),
            'branch_id' => $this->when($this->branch_id != null, $this->branch_id),
            'quotation_id' => $this->when($this->quotation_id != null, $this->quotation_id),
            'product_sales' => new ProductSaleCollection($this->whenLoaded('productSale')),
        ];
    }
}
