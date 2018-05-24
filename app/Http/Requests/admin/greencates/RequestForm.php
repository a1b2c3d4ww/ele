<?php

namespace App\Http\Requests\admin\greencates;

use Illuminate\Foundation\Http\FormRequest;

class RequestForm extends FormRequest
{
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
            'fname' => 'required|unique:take_greencates|regex:/^\S{1,36}$/'
        
        ];
    }
     public function messages()
    {
        return [
            'fname.required'=>"分类名不能为空",    
            // 'gpic.required'=>'图片未上传',
            // 'price.required'=>'价格不能为空'
            // 'password.required'=>'密码不能为空',
            // 'password.regex'=>'密码格式不正确',
            // 'repass.same'=>'两次密码不一致',
            // 'tel.required'=>'手机号不能为空',
            // 'tel.regex'=>'手机号码格式不正确'
        ];
    }
}
