<?php

namespace App\Http\Requests\Transfer;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransferRequest extends FormRequest
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
            'branch_id' => ['present', 'exists:branches,id'],
            'user_id' => ['present', 'exists:users,id'],
            'product_transfers' => ['present', 'array', 'min:1'],
            'product_transfers.*.product_id' => ['required', 'exists:products,id'],
            'product_transfers.*.quantity' => ['required'],
        ];
    }
}
