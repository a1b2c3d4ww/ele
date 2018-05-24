<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminUser;
class LoginController extends Controller
{
    //
    public function login()
    {
    	return view('admin.login.login',['title'=>'后台登录']);
    }
    public function dologin(Request $req)
    {
    	 $res = $req->except('_token');
         // dd($res);
    	   $user = AdminUser:: where('aname', '=', $res['aname'])->first();
        // dd($user);
        if(!$user){
            return back()->with('err','账号或密码错误');
        }
         $pass = decrypt($user['password']);

         $password = $res['password'];
       
         
         if(($pass==$password)&&$user){
            return redirect('admin/member');
         }else{
            return back()->with('err','账号或密码错误');
         } 

    
    }
}
