<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminUser;

use Hash;

class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('admin.login.login',['title'=>'后台登录']);
    }
    public function dologin(Request $req)
    {


    	 $res = $req->input('aname');
         
    	   $data = AdminUser:: where('aname', '=', $res)->first();
        
        if(!$data){
            return back()->with('err','账号或密码错误');
        }
         
         $pass = $req->input('password');
       
         if(!Hash::check($pass,$data->password)){
            return back()->with('err','账号或密码错误');
         }else{
            return redirect('admin/member');

         } 

    
    }
}
