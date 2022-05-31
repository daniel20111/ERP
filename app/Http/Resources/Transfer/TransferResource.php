<?php

namespace App\Http\Resources\Transfer;

use App\Http\Resources\Branch\BranchResource;
use App\Http\Resources\ProductTransfer\ProductTransferCollection;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TransferResource extends JsonResource
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
            'id' => $this->when($this->id != null, $this->id),
            'branch_id' => $this->when($this->branch_id != null, $this->branch_id),
            'user_id' => $this->when($this->user_id != null, $this->user_id),
            //'verified' => $this->when($this->verified != null, $this->verified),
            'verified' => $this->verified,
            'created_at' => $this->when($this->created_at != null, $this->created_at),
            'updated_at' => $this->when($this->updated_at != null, $this->updated_at),
            //'user' => $this->when($this->user != null, new UserResource($this->whenLoaded('user'))),
            //'branch' => $this->when($this->branch != null, new BranchResource($this->whenLoaded('branch'))),
            'user' => new UserResource($this->whenLoaded('user')),
            'branch' => new BranchResource($this->whenLoaded('branch')),
            'product_transfers' => new ProductTransferCollection($this->whenLoaded('product_transfers')),
        ];
        //return parent::toArray($request);
    }
}
