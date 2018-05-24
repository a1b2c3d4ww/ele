<?php

namespace App\Http\Requests\admin\admins;

use Illuminate\Foundation\Http\FormRequest;

class RequestForm extends FormRequest
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
            'aname' => 'required|unique:take_admins|regex:/^\w{1,12}$/',
            "password" => 'required|regex:/^\S{1,16}$/',
            'repass'=>'same:password',
            'tel'=>'required|regex:/^1[345678]\d{1,9}$/'  
        ];
    }
    public function messages()
    {
        return [
            'aname.required'=>"用户名不能为空",
            'aname.regex'=>'用户名格式不正确',
            'aname.unique'=>'用户名已存在',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'tel.required'=>'手机号不能为空',
            'tel.regex'=>'手机号码格式不正确'
        ];
    }
}
