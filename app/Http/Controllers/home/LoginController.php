<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\DologinRequest;
use Gregwar\Captcha\CaptchaBuilder;  
use App\AdminMember;
use Hash;
use Session;

class LoginController extends Controller
{
    // 登录
    public function login()
    {
      return view('home.login');
    }

	  // 验证码
    public function captcha()
    {
        //生成验证码图片的Builder对象，配置相应属性  
        $builder = new CaptchaBuilder;  
        //可以设置图片宽高及字体  
        $builder->build($width = 120, $height = 36, $font = null);  
        //获取验证码的内容  
        $phrase = $builder->getPhrase();  
        //把内容存入session  
        Session::flash('code', $phrase);  

        // Session::put('code',$phrase);

        // session(['code'=>$phrase]);

        // $request->session()->put('code',$pharse);

        //生成图片  
        header("Cache-Control: no-cache, must-revalidate");  
        header('Content-Type: image/jpeg');  
        $builder->output();
    } 


    // 密码登录验证
  	public function dologin(DologinRequest $req)
  	{
  		$res = $req->input('uname');
  		$data = AdminMember::where('uname',$res)->first();

  		if(!$data){
  			return back()->with('err','用户名或密码错误');
  		}

  		$code = $req->input('code');
          $check = Session::get('code');
          if($code!=$check){
              return back()->with('err','验证码错误');
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



}
