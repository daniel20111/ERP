<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'user' => 'present | array | max:1 | min:1',
            'user.*' => 'array:email_user,password_user,role_id',
            'users.*.email_user' => 'required | email | distinct | unique:users',
            'users.*.password_user' => 'required',
            'users.*.role_id' => 'required | exists:App\Models\Role,id'
        ];
    }
}
