<?php

namespace App\Http\Requests\admin\merchants;

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
            'mname' => 'required|unique:take_merchants|regex:/^\S{1,36}$/',
            'mpic'=>'required'

            // 'repass'=>'same:password',
            // 'tel'=>'required|regex:/^1[345678]\d{1,9}$/'  
        ];
    }
    public function messages()
    {
        return [
            'mname.required'=>"商家名不能为空",
            'mname.regex'=>'商家名格式不正确',
            'mname.unique'=>'商家名已存在',
            'mpic.required'=>'图片未上传',
            'mpic.regex'=>'图片格式不正确'
            // 'password.required'=>'密码不能为空',
            // 'password.regex'=>'密码格式不正确',
            // 'repass.same'=>'两次密码不一致',
            // 'tel.required'=>'手机号不能为空',
            // 'tel.regex'=>'手机号码格式不正确'
        ];
    }
}
