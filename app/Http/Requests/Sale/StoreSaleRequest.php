<?php

namespace App\Http\Requests\Sale;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreSaleRequest extends FormRequest
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
        $dateQuotation = Carbon::now();
        $userId = $this->user()->id;
        $branchId = $this->user()->employee->branch_id;
        $this->merge([  
            'date_sale' => $dateQuotation, 
            'user_id' => $userId,
            'branch_id' => $branchId,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name_sale' => ['present'],
            'nit_sale' => ['present'],
            'total_sale' => ['present'],
            'date_sale' => ['present'],
            'user_id' => ['present'],
            'branch_id' => ['present'],
            'product_sales' => ['present', 'array', 'min:1'],
        ];
    }
}
