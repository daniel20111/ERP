<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Branch\BranchResource;
use App\Http\Resources\Employee\EmployeeResource;
use App\Http\Resources\Role\RoleResource;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Suppoprt\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'role_id' => $this->role_id,
            'employee_id' => $this->employee_id,
            'role' => new RoleResource($this->whenLoaded('role')),
            'employee' => new EmployeeResource($this->whenLoaded('employee')),
            'branch' => new BranchResource($this->whenLoaded('employee.branch')),
        ];
        //return parent::toArray($request);
    }
}
