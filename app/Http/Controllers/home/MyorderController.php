<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\AdminMember;
use App\AdminOrders;
class MyorderController extends Controller
{
    //
    // 订单管理
	public function myorder()
	{	
		 $id = Session::get('homeUser.uid');

	    $res = AdminMember::where('uid',$id)->first();
	    $order = AdminOrders::where('uid',$id)->get();
	  
	    

	     // dd($order);
	     
	    

		return view('home.orders.myorder',['res'=>$res,'order'=>$order]); 
	
	}
	// 商家详情
	public function shopdetail()
	{	
		
		return view('home.shopdetail');
	}
    	// 订单支付
	public function orderpay()
	{
		return view('home.orderpay');
	}
	// 支付成功
	public function payend()
	{
		return view('home.payend');
	}

	// 地址管理
	public function addr()
	{
		return view('home.addr');
	}

	// 我的收藏
	public function collect()
	{
		return view('home.collect');
	}
}
