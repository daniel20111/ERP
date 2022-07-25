<?php

namespace App\Http\Requests\Quotation;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuotationRequest extends FormRequest
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
        $expirationDate = Carbon::now()->addWeek(1);
        $userId = $this->user()->id;
        $branchId = $this->user()->employee->branch_id;
        $this->merge([  
            'date_quotation' => $dateQuotation, 
            'expiration_date' => $expirationDate,
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
            'name_quotation' => ['present'],
            'price_quotation' => ['present'],
            'date_quotation' => ['present'],
            'expiration_date' => ['present'],
            'user_id' => ['present'],
            'branch_id' => ['present'],
            'product_quotations' => ['present', 'array', 'min:1']
        ];
    }
}
