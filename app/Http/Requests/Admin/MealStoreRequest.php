<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;


class MealStoreRequest extends FormRequest
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

  

    public function rules()
    {
        // dd(3547);
        return [
            'rest_name' => 'required|not_in:0',
            'name' => 'required',
            'sub_name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image'=> 'required|mimes:jpg,png,jpeg,gif',
        ];
    }

    public function attributes()
    {
        return [
            'rest_name' => 'restaurantname'
        ];
    }
    public function messages()
    {
        return [
            'rest_name.required' => 'Please Select Any One Restaurant Name',
            'name.required' => 'Add Food For Selected Resturant Is Requird',
            'sub_name.required'=> 'Sub Name of Food is requride'
        ];
    }
}
