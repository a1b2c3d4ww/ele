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
	  	


	     // dd($order);
	     
	    

		return view('home.myself',['res'=>$res,'order'=>$order]); 
	}

	// 个人资料
	public function myinfo()
	{	
		$id = Session::get('homeUser.uid');

	    $res = AdminMember::where('uid',$id)->first();	
	    // dd($res);
		return view('home.myinfo',['res'=>$res]);
	}

	public function dmyinfo(Request $req,$id)
	{
		

		 $res = $req->input();
           try{
           AdminMember::where('uid',$id)->update($res);
        }catch(\Exception $e){
           return back()->with('msg','修改失败');
        }
        	session::flush('homeUser');
        	$user = AdminMember::where('uid',$id)->first();
        	session::put('homeUser',$user);
        	// dd(session::get('homeUser'));
       		return redirect('/home/myinfo');
      	
      

		 // dd($data);

		
		
	    
		// return view('home.myinfo');

	}


	//评价
	public function reviews($id)
	{
		$res = AdminReviews::where('mid',$id)->get();
		// dd($res);
		$mid = AdminMerchant::where('mid',$id)->first();
		return view('home.reviews',['res'=>$res,'mid'=>$mid]);
	}
	

	
}
