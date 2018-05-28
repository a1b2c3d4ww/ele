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
		
		


		
		
		return view('home.orderdetail',['res'=>$res,'num'=>$num,'mid'=>$mid,'user'=>$user,'order'=>$order,'sum'=>$sum]);


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
       		return back();
      	
      


		 // dd($data);


		
		
	    
		// return view('home.myinfo');


	}
	//评价
	public function reviews($id)
	{
		$res = AdminReviews::where('mid',$id)->get();
		// dd($res);
		 // dd($id);
		$merchant = AdminMerchant::where('mid',$id)->first();
		// dd($merchant);
		return view('home.reviews',['res'=>$res,'merchant'=>$merchant]);
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
		// dd(session::get('carts'));
		$carts = session::get('carts');
		$cnt = 0;
		$sum = 0 ;
		foreach($carts as $k=>$v){
			$cnt += $v['num'];
			$sum += $v['price'];
		}
		session::put('orders.cnt',$cnt) ;
		session::put('orders.sum',$sum) ;
		// dd(session::forget('carts'));
		return back();
		
	}
	public function myinfopic(Request $req)
	 {	

		// dd($req);
	
		$res = $req->except('_token');
			if(!$req->upic){
				return back();
		}
		$user = session::get('homeUser.uid');
		$data = AdminMember::where('uid',$user)->first();
		// dd($req->get('profile'));
        if($req->upic){
            $name = time().'_'.rand(1111,9999);
            $suffix = $req->file('upic')->getClientOriginalExtension(); 
            $path = $req->file('upic')->move('./upload', $name.'.'.$suffix);
            $res['upic'] = '/upload/'.$name.'.'.$suffix;
          	
            if(file_exists('.'.$data->upic)){
                unlink('.'.$data->upic);
             }
        }
       

       try{
           AdminMember::where('uid',$user)->update($res);
        }catch(\Exception $e){
           return back()->with('msg','修改失败');
        }
           $user = AdminMember::where('uid',$user)->first();
           session::put('homeUser',$user);
           return back();
	}


	public function myreview(Request $req)
	{
		$res = $req->input();
		$mid = $res['mid'];
		// dd($mid);
		AdminReviews::create($res);
		$data = AdminReviews::where('mid',$mid)->get();
		$sum = 0;
		foreach($data as $k=>$v){
			$sum += $v['level'];
		}
			$avg = $sum/($k+1);
		AdminMerchant::where('mid',$mid)->update(['level'=>$avg]);
		return back();

	}

}
