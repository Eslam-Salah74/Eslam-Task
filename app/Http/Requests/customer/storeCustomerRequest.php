<?php

namespace App\Http\Requests\customer;

use Illuminate\Foundation\Http\FormRequest;

class storeCustomerRequest extends FormRequest
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
            
            'company'=>'required',
            'contact_person'=>'required',
            'email'=>'required|unique:customers,email',
            'phone'=>'required|unique:customers,phone',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'postal_code'=>'required',
            'country'=>'required',
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
