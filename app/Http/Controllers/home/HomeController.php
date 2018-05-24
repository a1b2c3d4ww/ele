<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminMember;
use App\Http\Requests\DoregRequest;
use App\Http\Requests\DologinRequest;
use Session;
use Hash;
use App\AdminReviews;
use App\AdminOrders;

class HomeController extends Controller
{
    // 首页
	public function home()
	{
		
		return view('home.index');

	}

    // 登录
	public function login()
	{
		return view('home.login');
	}

	// 登录验证
	public function dologin(DologinRequest $req)
	{
		$res = $req->input('uname');
		$data = AdminMember::where('uname',$res)->first();

		if(!$data){
			return back()->with('err','用户名或密码错误');
		}

		$pass = $req->input('password');
		if(!Hash::check($pass,$data->password)){
			return back()->with('err','用户名或密码错误');
		}else{
			$user = AdminMember::where('uname',$res)->first();
			Session::put('homeUser',$user);

			return redirect('/');
	     


		}

	}

	// 退出登录
	public function logout()
	{
		Session()->flush();
		return redirect('/');
	}


	// 注册
	public function reg()
	{
		return view('home.reg');
	}
	// 注册验证
	public function doreg(DoregRequest $req)
	{

		$res = $req->except('_token','repass','code');
        $res['password'] = Hash::make($req->input('password'));

        $code = $req->input('code');
		$check = Session::get('code');


		if($code!=$check){
			return back()->with('err','验证码有误');
		}else{
			$data = AdminMember::insert($res);	
			$user = AdminMember::where('uname',$res['uname'])->first();
			Session::put('homeUser',$user);
			if($data){
	            return redirect('/');
	        }
		}
			
	}



	



}
