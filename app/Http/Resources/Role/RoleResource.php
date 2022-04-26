<?php

namespace App\Http\Resources\Role;

use App\Http\Resources\Module\ModuleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
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
            'id' => $this->id,
            'role' => $this->name_role,
            'description' => $this->description_role,
            'modules' => ModuleResource::collection($this->modules)
        ];
    }
}
