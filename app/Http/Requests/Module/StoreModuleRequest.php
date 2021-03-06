<?php

namespace App\Http\Requests\Module;

use Illuminate\Foundation\Http\FormRequest;

class StoreModuleRequest extends FormRequest
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
            'modules' => 'present',
            'modules.*' => 'array:name_module',
            'modules.*.name_module' => 'required | max:20 | min:3 | present',
            
        ];
    }

    public function messages()
    {
        return [
            'modules.*.name_module.required' => 'The name of the module is required',
            //'modules.*.name_module.min:3' => 'The name of the module must contain at least 3 characteres',
            //'modules.*.name_module.max:20' => 'The name of the module is required',
        ];
    }
}
