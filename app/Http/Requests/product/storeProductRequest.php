<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class storeProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            
            'name'=>'required|string|min:3|unique:products,name',
            'weight'=>'required|numeric|gt:0',
            'price'=>'required|numeric|gte:0',
            'discount'=>'required|numeric|gte:0',
            'shipping_id'=>'required',
        ];
    }


    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            
        ];
    }
}
