<?php

namespace App\Http\Requests\Branch;

use Illuminate\Foundation\Http\FormRequest;

class StoreBranchRequest extends FormRequest
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
            'branches' => ['present', 'array', 'min:1'],
            'branches.*' => ['array:name_branch,address_branch,warehouses'],
            'branches.*.name_branch' => ['required', 'unique:branches,name_branch', 'min:3'], 
            'branches.*.address_branch' => ['required', 'min:3'],
            'branches.*.warehouses' => ['present', 'array'],
            'branches.*.warehouses.*' => ['array:name_warehouse'],
            'branches.*.warehouses.*.name_warehouse' => ['sometimes', 'required']
        ];
    }
}
