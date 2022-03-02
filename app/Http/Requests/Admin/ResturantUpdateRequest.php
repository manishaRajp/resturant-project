<?php

namespace App\Http\Requests\Admin;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class ResturantUpdateRequest extends FormRequest
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
        $rest = $this->id;
        return [
            'name' => 'required|unique:resturants,name,'.$rest,
            'address' => 'required',
            'email' => 'required',
            // 'description' => 'required',
            'contact' => 'required',
            'image' => 'nullable|mimes:jpg,png,jpeg,gif'
        ];
    }
}
