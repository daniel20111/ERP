<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'products' => ['present', 'array', 'min:1'],
            'products.*' => ['array:name_product,image_product,length_product,height_product,weight_product,units_box_product,brand_product,origin_product'],

            'products.*.name_product' => ['required', 'distinct'],
            'products.*.image_product' => ['required',],
            'products.*.length_product' => ['required',],
            'products.*.height_product' => ['required',],
            'products.*.weight_product' => ['required',],
            'products.*.units_box_product' => ['required',],
            'products.*.brand_product' => ['required',],
            'products.*.origin_product' => ['required',],
        ];
    }
}
