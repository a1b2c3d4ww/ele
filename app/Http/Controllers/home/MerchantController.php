<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminGreencate;
use App\AdminMerchant;
use App\AdminGreen;
class MerchantController extends Controller
{
    public function index($id)
    {
    	$merchant = AdminMerchant::where('mid',$id)->first();
    	$data = AdminGreencate::where('mid',$id)->get();
    	$greens = AdminGreen::where('mid',$id)->get();
    	// dd($greens);
    	return view('home/shopdetail',['data'=>$data,'merchant'=>$merchant]);
    }
}
