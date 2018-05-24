<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminUser;
use App\AdminCate;
use App\AdminMerchant;
class IndexController extends Controller
{
    public function adminajax(Request $req)
	{	
		$aid = $req->input('aid');
		$aname = $req->input('aname');
		$res = AdminUser::where('aid',$aid)->update(['aname'=>$aname]);

		if($res){
			echo 1;
		}else{
			echo 0;
		}
	}
	public function cateajax(Request $req)
	{
		$cid = $req->input('cid');
		$cname = $req->input('cname');
		// dd($cname);
		if(!strstr($cname,'|--')){
			return 0;
		}
		$arr = explode('|--', $cname);
		// dd($arr);
		$cname = $arr[1];
		// dd($cname);
		$res = AdminCate::where('cid',$cid)->update(['cname'=>$cname]);
		if($res){
			echo 1;
		}else{
			echo 0;
		}
	}
	 public function merchantajax(Request $req)
	{	
		$mid = $req->input('mid');
		$mname = $req->input('mname');
		$res = AdminMerchant::where('mid',$mid)->update(['mname'=>$mname]);

		if($res){
			echo 1;
		}else{
			echo 0;
		}
	}
}
