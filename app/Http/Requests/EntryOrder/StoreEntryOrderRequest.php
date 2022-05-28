<?php

namespace App\Http\Requests\EntryOrder;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntryOrderRequest extends FormRequest
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
            'code_entry_order' => ['present'],
            'entry_order_product' => ['present', 'array', 'min:1'],
            'entry_order_product.*' => ['array:product_id,quantity'],
            'entry_order_product.*.product_id' => ['required', 'exists:products,id'],
            'entry_order_product.*.quantity' => ['required'],
        ];
    }
}
