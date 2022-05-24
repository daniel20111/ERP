<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        $data = $this->toArray();
        data_set($data, 'users.*.password_user', Hash::make('123'));
        $this->merge($data);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'users' => 'present | array | min:1',
            'users.*' => 'array:email,role_id,employee_id,password_user',
            'users.*.email' => 'required | email | distinct | unique:users',
            'users.*.password_user' => 'required',
            'users.*.role_id' => 'required | exists:App\Models\Role,id',
            'users.*.employee_id' => 'required | exists:App\Models\Employee,id'
        ];
    }
}
