<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCate;
use App\AdminMerchant;
use App\AdminGreen;
use Session;
class AjaxController extends Controller
{
    public function firstajax($id)
    {
    	$data  = AdminCate::get();
    	$data = getlevelcates($data);

    	$data = $data[$id];
    	if($data){
    		return $data;
    	}else{
    		return 0;
    	}
    }	
    public function listajax($id)
    {
       $arr[] = $id;
       $datas = getzileisub($arr,$id);
       // dd($datas);
       $list = AdminMerchant::whereIn('cid',$datas)->get();
    	if($list){
    		return $list;
    	}else{
    		return 0;
    	}
    }
    // public function cartajax($id){
    //   $greens =  AdminGreen::where('gid',$id)->get();
    //   $cnt = 0;
    //   $greens['cnt'] = $cnt;
    //   session(['carts.'.$id=>$greens]);
    //   $data = session()->get('carts.'.$id);
    //   // dd($data);
    //   return $data;
    // }
    public function addcartajax($id)
    {
    
       $data =  AdminGreen::where('gid',$id)->first();
       
       
      
      // dd($data);
       return $data;
    }
     public function subcartajax($id)
    {
     
       $data =  AdminGreen::where('gid',$id)->first();
       
       
      
      // dd($data);
       return $data;
    }
}
