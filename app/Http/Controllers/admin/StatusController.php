<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\AdminMerchant;
use App\AdminGreen;
use App\AdminAdver;
use App\AdminLinks;
use App\AdminOrders;
class StatusController extends Controller
{
    public function merchantup($id)
    {	
    	try{
    		AdminMerchant::where('mid',$id)->update(['status'=>'2']);
    	}catch(\Exception $e){
    		return back()->with('msg','更新失败');
    	}
    		return redirect('admin/merchant');
    	
    }
    public function merchantdown($id)
    {
    	try{
    		AdminMerchant::where('mid',$id)->update(['status'=>'0']);
    	}catch(\Exception $e){
    		return back()->with('msg','更新失败');
    	}
    		return redirect('admin/merchant');
    }
     public function greenup($id)
    {   
        try{
            AdminGreen::where('gid',$id)->update(['status'=>'1']);
        }catch(\Exception $e){
            return back()->with('msg','更新失败');
        }
            return redirect('admin/green/index');
        
    }
    public function greendown($id)
    {
        try{
            AdminGreen::where('gid',$id)->update(['status'=>'0']);
        }catch(\Exception $e){
            return back()->with('msg','更新失败');
        }
            return redirect('admin/green/index');

}
    
    public function adverup($id,$status=0)

    {
         $data['status'] = $status;
          try{
           AdminAdver::where('lid',$id)->update($data);
        }catch(\Exception $e){
           return back()->with('msg','更新失败');
        }
       return redirect('/admin/adver');
    }
    public function adverdown($id,$status=1)
    {
        // echo 11;

        $data['status'] = $status;
          try{
           AdminAdver::where('lid',$id)->update($data);
        }catch(\Exception $e){
           return back()->with('msg','更新失败');
        }
       return redirect('/admin/adver'); 

    }


      public function linkup($id,$status=0)
    {
         $data['status'] = $status;
          try{
           AdminLinks::where('yid',$id)->update($data);
        }catch(\Exception $e){
           return back()->with('msg','更新失败');
        }
       return redirect('/admin/links');
    }
    public function linkdown($id,$status=1)
    {
        // echo 11;

        $data['status'] = $status;
          try{
           AdminLinks::where('yid',$id)->update($data);
        }catch(\Exception $e){
           return back()->with('msg','更新失败');
        }
       return redirect('/admin/links'); 
    }


   

    public function orderdown($id,$status=3)
    {
       $data['status'] = $status;
          try{
           AdminOrders::where('uid',$id)->update($data);
        }catch(\Exception $e){
           return back()->with('msg','更新失败');
        }
       return redirect('/admin/orders'); 

    }

   

    public function homedown($id,$status=4)
    {
       $data['status'] = $status;
          try{
           AdminOrders::where('uid',$id)->update($data);
        }catch(\Exception $e){
           return back()->with('msg','更新失败');
        }
       return redirect('/home/myorder'); 

    }
      public function homeorder($id,$status=0)
    {
       $data['status'] = $status;
          try{
           AdminOrders::where('uid',$id)->update($data);
        }catch(\Exception $e){
           return back()->with('msg','更新失败');
        }
       return redirect('/home/myorder'); 

    }



}
