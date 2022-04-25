<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
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
            'user.*' => 'array:id,email_user,password_user,role_id',
            //'user.*.email_user' => 'required|email|unique:users,email_user,'.$this->route('id'),
            'user.*.id' => ['required', 'exists:users', Rule::unique('users')->ignore($this->user[0]['id'])],
            'user.*.email_user' => ['required', 'email' , Rule::unique('users')->ignore($this->user[0]['id'])],
            'user.*.password_user' => 'required',
            'user.*.role_id' => 'required | exists:App\Models\Role,id'
        ];
    }
}
