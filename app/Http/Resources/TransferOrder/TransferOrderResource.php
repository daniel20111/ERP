<?php

namespace App\Http\Resources\TransferOrder;

use App\Http\Resources\Transfer\TransferResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TransferOrderResource extends JsonResource
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
            'sent' => $this->sent,
            'received' => $this->received,
            'received_by' => $this->when($this->received_by != null, $this->received_by),
            'send_by' => $this->when($this->send_by != null, $this->send_by),
            'transfer_id' => $this->when($this->transfer_id != null, $this->transfer_id),
            'created_at' => $this->when($this->created_at != null, $this->created_at),
            'updated_at' => $this->when($this->updated_at != null, $this->updated_at),

            'transfer' => new TransferResource($this->whenLoaded('transfer')), 
            'sent_by' => new UserResource($this->whenLoaded('sent_by')),
            'received_by' => new UserResource($this->whenLoaded('received_by')),
        ];
        //return parent::toArray($request);
    }
}
