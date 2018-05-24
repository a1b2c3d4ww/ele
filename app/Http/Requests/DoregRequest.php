<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoregRequest extends FormRequest
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
            'number'=>'required',
            'uname' => 'required|unique:take_users|regex:/^\w{4,12}$/',
            "password" => 'required|regex:/^\S{6,16}$/',
            'repass'=>'same:password'
            
        ];
    }

      public function messages()
    {
        return [
            'number.required'=>'请输入验证码',
            'uname.required'=>"用户名/密码 不能为空",
            'uname.regex'=>'用户名格式不正确',
            'uname.unique'=>'用户名已存在',
            'password.required'=>'用户名/密码 不能为空',
            'password.regex'=>'密码格式不正确', 
            'repass.same'=>'两次密码不一致'
            
        ];
    }
}
