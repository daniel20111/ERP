<?php

namespace App\Http\Resources\Quotation;

use App\Http\Resources\Branch\BranchResource;
use App\Http\Resources\ProductQuotation\ProductQuotationCollection;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class QuotationResource extends JsonResource
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
            'name_quotation' => $this->when($this->name_quotation != null, $this->name_quotation),
            'price_quotation' => $this->when($this->price_quotation != null, $this->price_quotation),
            'date_quotation' => $this->when($this->date_quotation != null, $this->date_quotation),
            'expiration_date' => $this->when($this->expiration_date != null, $this->expiration_date),
            'user_id' => $this->when($this->user_id != null, $this->user_id),
            'branch_id' => $this->when($this->branch_id != null, $this->branch_id),

            'user' => new UserResource($this->whenLoaded('user')),
            'branch' => new BranchResource($this->whenLoaded('branch')),
            'product_quotations' => new ProductQuotationCollection($this->whenLoaded('productQuotation'))
            
        ];
    }
}
