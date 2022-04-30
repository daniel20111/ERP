<?php

namespace App\Http\Requests\Section;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
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
            'warehouses' => ['present', 'array', 'min:1'],
            'warehouses.*' => ['array:id,sections'],
            'warehouses.*.id' => ['required', 'exists:warehouses,id', 'distinct'],
            'warehouses.*.sections' => ['present', 'array', 'min:1'],
            'warehouses.*.sections.*' => ['array:name_section'],
            'warehouses.*.sections.*.name_section' => ['required']
        ];
    }
}
