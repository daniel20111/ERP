<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'employees' => ['present', 'array', 'min:1'],
            'employees.*' => ['array:names_employee,last_name_employee,CI_employee,birth_date_employee,branch_id'],
            'employees.*.names_employee' => ['required'],
            'employees.*.last_name_employee' => ['required'],
            'employees.*.CI_employee' => ['required'],
            'employees.*.birth_date_employee' => ['required'],
            'employees.*.branch_id' => ['required']
        ];
    }
}
