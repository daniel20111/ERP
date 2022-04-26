<?php

namespace App\Http\Requests\Warehouse;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarehouseRequest extends FormRequest
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
            'branches.*' => ['array:id,warehouses'],
            'branches.*.id' => ['required', 'exists:branches,id'],
            'branches.*.warehouses' => ['present', 'array', 'min:1'],
            'branches.*.warehouses.*' => ['array:name_warehouse'],
            'branches.*.warehouses.*.name_warehouse' => ['required']
        ];
    }
}
