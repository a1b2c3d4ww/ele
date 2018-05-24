<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormUpdate extends FormRequest
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
           
            'tel'=>'required|regex:/^1[0-9]{10}$/'  
        ];
    }

      public function messages()
    {
        return [
          
            'tel.required'=>'手机号不能为空',
            'tel.regex'=>'手机号码格式不正确'
        ];
    }
}
