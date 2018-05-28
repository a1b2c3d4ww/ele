<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminUser;


use Hash;
use Session;

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
           // dd($data);
        
        if(!$data){
            return back()->with('err','账号或密码错误');
        }
         
         $pass = $req->input('password');
         // dd($pass);
       
         if(0){
            return back()->with('err','账号或密码错误');
         }else{
            session::put('adminUser',$data);
            // dd( session::get('adminUser'));
            return redirect('admin/member');


         } 

    
    }
    public function loginout()
    {
         session::flush('adminUser');
         return redirect('admin/login');
    }
}
