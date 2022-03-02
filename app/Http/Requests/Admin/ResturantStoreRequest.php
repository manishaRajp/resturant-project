<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ResturantStoreRequest extends FormRequest
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
            'restaurant' => 'required|unique:resturants,name',
            'address' => 'required',
            'email' => 'required | unique:resturants,email',
            'description' => 'required',
            'contact' => 'required| unique:resturants,Contact|max:10',
            'image' => 'required|mimes:jpg,png,jpeg,gif',
            'video' => 'required|file|mimetypes:video/mp4',
        ];
    }
    public function attributes()
    {
        return [
            'restaurant' => 'restaurant'
        ];
    }
    public function messages()
    {
        return [
            'restaurant.required' => 'Please enter Restaurant Name',
            'restaurant.unique' => 'The Resturant is already Taken',
            'email.unique' => 'The Email is already Taken',
        ];
    }
}
