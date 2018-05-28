<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCate;
use App\AdminMerchant;
use App\AdminGreen;

use App\AdminMember;

use App\AdminUser;
use App\Enshrine;




use Session;
class AjaxController extends Controller
{

    public function firstlist()
    {
      $mid =  $_GET['mid'];
      $data = AdminMerchant::where('mid',$mid)->first();

      return $data;
    }

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


    public function enshrineajax($id)
    {
         $user = session::get('homeUser.uid');
         $enshrine = Enshrine::where('uid',$user)->where('mid',$id)->first();
         if(empty($enshrine)){
              Enshrine::create(['uid'=>$user,'mid'=>$id]);
              echo 1;
         }else{
              Enshrine::where('uid',$user)->where('mid',$id)->delete();
              echo 0;
         }

    }


    public function passwordAjax()
    {
      $user = Session::get('data.uname');
      $tel = $_GET['tel'];

      $data = AdminMember::where('uname',$user)->where('tel',$tel)->first();
      // return $data;
      if($data){
        echo 1;
      }else{
        echo 0;
      }
    }


}
