<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdverRequest extends FormRequest
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
             "lname" => 'required|unique:take_advertis|regex:/^(?=^.{3,255}$)(http(s)?:\/\/)?(www\.)?[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+(:\d+)*(\/\w+\.\w+)*$/',
        ];
    }

     public function messages()
    {
        return [
         
            'lname.unique'=>'链接已存在',
            'lname.required'=>'链接不能为空',
            'lname.regex'=>'链接格式不正确'
        ];
    }
}
