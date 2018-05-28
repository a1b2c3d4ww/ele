<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminMember;
use App\Http\Requests\PasswordRequest;
use Hash;
use Session;

class PasswordController extends Controller
{	
  // 修改密码
  public function updatepwd()
  {
    return view('home.password.updatepwd');
  }

  // 修改验证
  public function doupdate(PasswordRequest $req)
  {
    $user = session::get('homeUser.uname');
    $pass = session::get('homeUser.password');

    // $oldpass =Hash::make($req->input('oldpass'));
    $oldpass =$req->input('oldpass');
    $password['password'] =Hash::make($req->input('password'));

    if($req->input('oldpass')==null){
      return back()->with('err','旧密码不能为空');
    }
    if(!Hash::check($oldpass,$pass)){
      return back()->with('err','旧密码输入错误');
    }
    
    $data = AdminMember::where('uname',$user)->update($password);
    if($data){
      return redirect('/home/logout');
    }
  }





  //忘记密码
	// 1.填写用户名
    public function forget()
    {
    	return view('home.password.forget');
    }

    public function doforget(Request $req)
    {
    	$res = $req->input('uname');
  		$data = AdminMember::where('uname',$res)->first();

  		session(['data'=>$data]);

  		if($res==null){
  			return back()->with('err','请输入用户名');
  		}
  		if(!$data){
  			return back()->with('err','用户名不存在');
  		}

    	$code = $req->input('code');
    	if($code==null){
  			return back()->with('err','验证码不能为空');
  		}
        $check = Session::get('code');
	    if($code!=$check){
          return back()->with('err','验证码错误');
      	}else{
      		return redirect('/home/forget2');
      	}
    	
    }


    // 2.验证身份
    public function forget2()
    {
    	return view('home.password.forget2');
    }

    public function doforget2(Request $req)
    {
    	$res = $req->input('tel');
    	if($res==null){
  			return back()->with('err','手机号不能为空');
  		}
  		$reg = '/^1[3456789]\d{9}$/';
  		$check = preg_match($reg, $res);
  		if($check==0){
  			return back()->with('err','手机号格式不正确');
  		}

    	$number = $req->input('number');
        $check = Session::get('message');
        // dd($check);
        if($number==null){
  			return back()->with('err','验证码不能为空');
  		}

        if($number!=$check){
            return back()->with('err','验证码有误');
        }else{
        	return redirect('/home/forget3');
        }
    }



    // 3.新密码
    public function forget3()
    {
    	return view('home.password.forget3');
    }

     public function doforget3(PasswordRequest $req)
    {
    	
    	$uname = Session::get('data.uname');
    	$password = Session::get('data.password');

    	$res['password'] = Hash::make($req->input('password'));

    	$data = AdminMember::where('uname',$uname)->update($res);
    	
    	if($data){
    		$user = AdminMember::where('uname',$uname)->first();
    		Session::put('homeUser',$user);
    		return redirect('/home/forget4');
    	}

    }


    // 4.修改成功
    public function forget4()
    {
    	return view('home.password.forget4');
    }

    
   
}
