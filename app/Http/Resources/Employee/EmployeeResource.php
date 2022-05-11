<?php

namespace App\Http\Resources\Employee;

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
            'id' => $this->id,
            'names_employee' => $this->names_employee,
            'last_name_employee' => $this->last_name_employee,
            //'CI_employee' => $this->CI_employee,
            'CI_employee' => $this->when($request->complete == true, $this->CI_employee),
            'birth_date_employee' => $this->birth_date_employee,
            'user' => new UserResource($this->whenLoaded('user'))
            //'user' => new UserResource($this->user)
        ];
    }
}
