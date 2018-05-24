<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            //
            'uname' => 'required|unique:take_users|regex:/^\w{1,12}$/',
            "password" => 'required|regex:/^\S{1,16}$/',
            'repass'=>'same:password',
            'tel'=>'required|regex:/^1[0-9]{10}$/'  
        ];
    }
    /*
    获取已定义验证规则的错误消息
     */
     public function messages()
    {
        return [
            'uname.required'=>"账号不能为空",
            'uname.regex'=>'账号格式不正确',
            'uname.unique'=>'账号已存在',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'tel.required'=>'手机号不能为空',
            'tel.regex'=>'手机号码格式不正确'
        ];
    }
}
