<?php

namespace App\Http\Requests\BInventory;

use Illuminate\Foundation\Http\FormRequest;

class StoreBInventoryRequest extends FormRequest
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
        $userId = $this->user()->id;
        $data = $this->toArray();
        data_set($data, 'b_inventories.*.user_id', $userId);
        for($i = 0; $i < count($data['b_inventories']); $i ++)
        {
            data_set($data, 'b_inventories.'.$i.'.remain_units', $this->toArray()['b_inventories'][$i]['quantity']);
        }
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
            'b_inventories' => ['present', 'array', 'min:1'],
            'b_inventories.*' => ['array:quantity,remain_units,product_id,section_id,user_id,product_transfer_id'],
            'b_inventories.*.quantity' => ['required',],
            'b_inventories.*.remain_units' => ['required',],
            'b_inventories.*.product_id' => ['required',],
            'b_inventories.*.section_id' => ['required',],
            'b_inventories.*.user_id' => ['required',],
            'b_inventories.*.product_transfer_id' => ['required',],
        ];
    }
}
