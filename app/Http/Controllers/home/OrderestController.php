<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\AdminOrders;
class OrderestController extends Controller
{
    public function index(Request $req,$id)
    {
      // dd($req);
    	$res = $req->input();
    	 // dd($res);
    	$arr = [];
  		foreach($res['gname'] as $k=>$v){
	        $arr[$k]['gname'] = $res['gname'][$k];
	        $arr[$k]['price']  = $res['price'][$k];
	        $arr[$k]['num']  = $res['num'][$k];
       		$arr[$k]['gid']  = $res['gid'][$k];
   		 }
   		 // dd($arr);
   		 
   		 // dd($arr);
   		 $sum = 0;
   		 $cnt = 0;
   		 foreach($arr as $k=>$v){
   		 	$cnt += $v['num'];
   		 	$sum += $v['price'];
   		 }
   		 $sum = $sum+10;
   		 // dd($sum);
   		 $user = session::get('homeUser');
   		
		 // dd($arr);
   		session::put('orders.cnt',$cnt);
   		session::put('orders.sum',$sum);
   		session::put('orders.mid',$id);
   		session::put('carts',$arr);
    	 return view('home/orderinfo',['sum'=>$sum,'user'=>$user,'arr'=>$arr,'cnt'=>$cnt]);
    }
    public function pay(Request $req)
    {
    	$res = $req->except('_token');
    	$mid = session::get('orders.mid');
    	$sum = session::get('orders.sum');
    	$mname = getmName($mid);
    	$details = $res['details'];
    	 $user = session::get('homeUser');
    	session::put('orders.details',$details);
    	return view('home/orderpay',['mname'=>$mname,'user'=>$user,'sum'=>$sum]);
    }
    public function finish()
    {

    	// $data = AdminOrders::with('details')->where('oid','2018')->get();
    	// $details = AdminOrders::with('details')->where('oid','20181111111')->get();
  

    	// dd($details);
		// $details->find($oid)->details()->createMany(session('carts'));
    	// dd($data);
    	$user = session::get('homeUser');
      session::put('orders.oid',date('Ym').rand(1,1000));
    	session::put('orders.uname',$user['uname']);
    	session::put('orders.addr',$user['addr']);
    	session::put('orders.uid',$user['uid']);
    	session::put('orders.status',1);
    	session::put('orders.tel',$user['tel']);
    	session::put('orders.otime',time());
   	
      // dd(session::get('orders.oid'));
    	$orders = session::get('orders');
    	// dd(session('carts'));
    	$details = AdminOrders::create($orders);
      // AdminOrders::find(session::get('orders.oid'))->details()->createMany(session('carts'));
		  $details->find(session::get('orders.oid'))->details()->createMany(session('carts'));
    	session::put('carts',null);
    	return view('home/payend',['user'=>$user]);
    }

}
