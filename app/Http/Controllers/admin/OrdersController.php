<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminOrders;
use App\ReadOrders;
use App\AdminMember;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {   

         $arr = $req->all();
         $condition = [];
        if(!empty($req->input('search'))){
            $condition[] = ['oid','like','%'.$req->input('search').'%'];
        }

         $data = AdminOrders::get();

        $res = AdminOrders:: where($condition)->orderBy('otime','desc')->paginate($req->input('num',10));   

          // dd($res) ;

        $count =  count(AdminOrders::all());
        
        $num = $req->input('num');
        $search = $req->input('search');

        return view('admin.orders.index',[
            'title'=>'订单列表',
            'res'=>$res,
            'num'=>$num,
            'search'=>$search,

            'request'=>$arr,
            'count'=>$count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $res = AdminOrders::where('oid',$id)->first();
        return view('admin.orders.edit',[
            'title'=>'订单的修改页面',
            'res'=>$res
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $data = AdminOrders::where('oid',$id)->first();
        $res =  $req->except('_token','_method');
          try{
           AdminOrders::where('oid',$id)->update($res);
        }catch(\Exception $e){
           return back()->with('msg','添加失败');
        }
       return redirect('/admin/orders');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

         $req = AdminOrders::where('uid',$id)->first();

         try{
          AdminOrders::where('uid',$id)->delete();

        }catch(\Exception $e){
           return back()->with('msg','添加失败');
        }
       return redirect('/admin/orders');
        
    }
     public function read($id)
    {   

        $res = ReadOrders::where('oid',$id)->get();

        return view('admin.orders.read',[
            'title'=>'订单详情',
            'res'=>$res
        ]);
       


    }
}
