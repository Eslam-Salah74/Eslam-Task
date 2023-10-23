<?php

namespace App\Http\Requests\sale;

use Illuminate\Foundation\Http\FormRequest;

class storeSaleRequest extends FormRequest
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
            'sub_total'=>'required',
            'shipping'=>'required',
            'vat'=>'required',
            'discount'=>'required',
            'total'=>'required',
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
