<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminMember;
use App\AdminOrders;
use App\AdminReviews;
use App\ReadOrders;
use App\AdminGreen;
use App\AdminMerchant;
use App\Enshrine;
use Session;
class MyselfController extends Controller
{
    	
	

	// 订单详情
	public function orderdetails($id1,$id2)
	{	
	
		$res = ReadOrders::where('oid',$id1)->first();
		$num = ReadOrders::where('oid',$id1)->get();
	
		 // dd($numa);
		$sum = 0;
		foreach($num as $k=>$v){
			$sum += ($v->num*$v->price);
		}	
		$sum =$sum+6;
		// dd($sum);
		
		$mid = AdminMerchant::where('mid',$id2)->first();
		$id = Session::get('homeUser.uid');
		$user = AdminMember::where('uid',$id)->first();

		$order = AdminOrders::where('uid',$id)->first();
		
		
		
		
		return view('home.orders.orderdetails',['res'=>$res,'num'=>$num,'mid'=>$mid,'user'=>$user,'order'=>$order,'sum'=>$sum]);
	}


    public function myself()
	{	
		 $id = Session::get('homeUser.uid');
	    $res = AdminMember::where('uid',$id)->first();
	    $order = AdminOrders::where('uid',$id)->get();
	  
		// dd(session::get('mid'));
	    // dd($res);
	     // dd($order);
	     
	    

		return view('home.myself',['res'=>$res,'order'=>$order]); 
	}

	// 个人资料
	public function myinfo()
	{	
		$id = Session::get('homeUser.uid');

	    $res = AdminMember::where('uid',$id)->first();	
		return view('home.myinfo',['res'=>$res]);
	}
	//评价
	public function reviews($id)
	{
		$res = AdminReviews::where('mid',$id)->get();
		// dd($res);
		 
		return view('home.reviews',['res'=>$res]);
	}
	//收藏
	public function enshrine()
	{
		$user = session::get('homeUser.uid');
		// dd($user);
		$res = Enshrine::where('uid',$user)->get();
		// dd($res);
		$mid = [];
		foreach($res as $k=>$v){
			$mid[] = $v->mid;
		}
		$count = count($mid);
		// dd($mid);
		return view('home/collect',['res'=>$res,'mid'=>$mid,'count'=>$count]);
	}
	public function enshrinedel($id)
	{	
		$user = session::get('homeUser.uid');
		
		Enshrine::where('uid',$user)->where('mid',$id)->delete();

		return back();
		
	}
	public function mycarts()
	{
		return view('home/mycarts');
	}
	public function mycartsdel($id)
	{
		session::forget('carts.'.$id);
		// dd(session::forget('carts'));
		return back();
		
	}
}
