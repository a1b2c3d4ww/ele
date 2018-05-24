<?php

namespace App\Http\Requests\admin\cates;

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
            'cname' => 'required|unique:take_admins|regex:/^\w{1,12}$/',
          
        ];
    }
    public function messages()
    {
        return [
            'cname.required'=>"分类名不能为空",
            'cname.regex'=>'分类名格式不正确',
            'cname.unique'=>'分类名已存在'
        ];
    }
}
