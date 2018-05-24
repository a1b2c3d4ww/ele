<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminCate;
use App\AdminMerchant;
use App\AdminLinks;
use DB;
use json;
class FirstController extends Controller
{
   public function index()
   {
   	 $data  = AdminCate::get();
   	
   	 
   	 $data = getlevelcates($data);
     $merchants  = AdminMerchant::get();
     // dd($merchants);die;
      
   	 //  print_r($data);die;
  // 	$res = AdminMerchant::select(DB::raw('*,concat(path,cid) as paths'))->orderBy('paths')
  //        ->where('cname','like','%'.$req->input('search').'%')
  //        ->paginate($req->input('num',10));
 	// dd($id);
    

        // dd($datas);die;
      // $res =  DB::table('take_merchants')->whereIn('cid', $datas)->get();

      // dd($res);die;

     
      // dd($res);
   	 return view('home/index',['data'=>$data,'merchants'=>$merchants]);
   }
}
