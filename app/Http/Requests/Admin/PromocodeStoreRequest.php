<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PromocodeStoreRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // dd(435);
        return [
            'promo_code'=> 'required|regex:/^[A-Z]+/|min:4|max:7|unique:discount_coupons,promo_code',
            'discount'=> 'required',
            'details'=> 'required',
            'start_date'=> 'required',
            'end_date'=> 'required',
            'max_transaction'=> 'required',
            'min_transaction'=> 'required',
            'time_of_applicable'=> 'required',
        ];
    }
    public function messages()
    {
        return [
            'promo_code.required' => 'This is required',
            'promo_code.regex' => 'First Latter must be in Uppercase',

        ];
    }
}
