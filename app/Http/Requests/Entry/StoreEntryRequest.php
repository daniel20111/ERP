<?php

namespace App\Http\Requests\Entry;

use Illuminate\Foundation\Http\FormRequest;

class StoreEntryRequest extends FormRequest
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
            'quantity_entry' => ['present', 'required'],
            'remain_entry' => ['present', 'required'],
            'product_id' => ['present', 'required', 'exists:products,id'],
            'section_id' => ['present', 'required', 'exists:sections,id'],
            'entry_order_products_id' => ['present', 'required', 'exists:entry_order_products,id'],
        ];
    }
}
