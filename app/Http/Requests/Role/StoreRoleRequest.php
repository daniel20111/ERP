<?php

namespace App\Http\Requests\Role;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'roles' => 'present',
            'roles.*' => 'array:name_role,description_role,modules',
            'roles.*.name_role' => 'required | max:50 | min:4',
            'roles.*.description_role' => 'max:200 | min:0',
            'roles.*.modules' => 'present',
            'roles.*.modules.*' => 'array:id',
            'roles.*.modules.*.id' => 'required',
        ];
    }
}
