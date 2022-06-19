<?php

namespace App\Http\Resources\Employee;

use App\Http\Resources\Branch\BranchResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'names_employee' => $this->when($this->names_employee != null, $this->names_employee),
            'last_name_employee' => $this->when($this->last_name_employee != null, $this->last_name_employee),
            'CI_employee' => $this->when($this->CI_employee != null, $this->CI_employee),
            'birth_date_employee' => $this->when($this->birth_date_employee != null, $this->birth_date_employee),
            'branch_id' => $this->when($this->branch_id != null, $this->branch_id),
            //'user' => $this->when($this->user != null, new UserResource($this->whenLoaded('user'))),
            'user' => new UserResource($this->whenLoaded('user')),
            'branch' => new BranchResource($this->whenLoaded('branch')),
        
            // 'id' => $this->id,
            // 'names_employee' => $this->names_employee,
            // 'last_name_employee' => $this->last_name_employee,
            // //'CI_employee' => $this->CI_employee,
            // 'CI_employee' => $this->when($request->complete == true, $this->CI_employee),
            // 'birth_date_employee' => $this->birth_date_employee,
            // //'user' => new UserResource($this->user)
        ];
    }
}
