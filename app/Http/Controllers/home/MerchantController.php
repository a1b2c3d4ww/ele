<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminGreencate;
use App\AdminMerchant;
use App\AdminGreen;

use App\Enshrine;

use Session;

class MerchantController extends Controller
{
    public function index($id)
    {
    	$merchant = AdminMerchant::where('mid',$id)->first();
    	$data = AdminGreencate::where('mid',$id)->get();
    	$greens = AdminGreen::where('mid',$id)->get();

        
        if(session::get('homeUser.uid')){
         $arr = session::get('mid');
            if(!$arr){
                $arr = [];
                array_push($arr,$id);
                session::put('mid',$arr);
            }else{
                array_push($arr,$id);
                $arr = array_unique($arr);
                session::put('mid',$arr); 
            }
           
        }

        
        
        
        // dd(session::get('id'));
    	 $user = session::get('homeUser.uid');
         $enshrine = Enshrine::where('uid',$user)->where('mid',$id)->first();
    	return view('home/shopdetail',['data'=>$data,'merchant'=>$merchant,'mid'=>$id,'enshrine'=>$enshrine]);

    }
}
