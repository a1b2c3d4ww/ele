<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCate;
use App\AdminMerchant;
use App\AdminAdver;
use DB;
use json;
class FirstController extends Controller
{
   public function index()
   {
   	 $data  = AdminCate::get();
   	 $data = getlevelcates($data);

     $merchants  = AdminMerchant::get();

     $adver = AdminAdver::where('status','=',1)->get();
     $count = count($adver);
     
   	 return view('home/index',['data'=>$data,
                              'merchants'=>$merchants,
                              'adver'=>$adver,
                              'count'=>$count
                            ]);

   }
}
