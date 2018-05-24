<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ucpaas;
use App\Http\Requests\DoregRequest;
use App\AdminMember;
use Session;
use Hash;

class RegisterController extends Controller
{

    // 注册
    public function reg()
    {
        return view('home.reg');
    }

    public function yzm()
    {
        require_once('./home/lib/Ucpaas.class.php');
        $options['accountsid']='669e107d44ec667d943e08f09cb16ed3';
        $options['token']='65c4a5158ddc05ad95c600df65db7336';

        //初始化 $options必填
        $ucpass = new Ucpaas($options);

        //开发者账号信息查询默认为json或xml

        $ucpass->getDevinfo('xml');

        $code = rand(111111,999999);

        $toNumber = $_POST['number'];

        // $_SESSION['code'] = $code;
        session(['code'=>$code]);

        $appId ="b8d2313f96d54407a134c5a91c42e3ac";

        // $to = "13911373063";
        $templateId = "326589";
        $param=$code;

        $ucpass->templateSMS($appId,$toNumber,$templateId,$param);

        echo $code;
        session(['message'=>$code]);

    }


    // 注册验证
    public function doreg(DoregRequest $req)
    {

        $res = $req->except('_token','repass','number');
        $res['password'] = Hash::make($req->input('password'));

        $number = $req->input('number');
        $check = Session::get('message');

        if($number!=$check){
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
