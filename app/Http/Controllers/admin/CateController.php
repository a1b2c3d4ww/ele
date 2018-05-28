<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\cates\RequestForm;
use App\AdminCate;
use App\AdminMerchant;
use DB;
class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
         $res = AdminCate::select(DB::raw('*,concat(path,cid) as paths'))->orderBy('paths')
         ->where('cname','like','%'.$req->input('search').'%')
         ->paginate($req->input('num',10));
        $count =  count(AdminCate::all());
        $num = $req->input('num',10);
        $search = $req->input('search');
        foreach($res as $k=>$v){
            $foo = explode(',',$v->path);
            // dd($foo);
            $level = count($foo)-2;
            // dd($level);
            $v->level = $level;
            // $v->cname = str_repeat('&nbsp;',$level*8).'|--'.$v->cname;
        }
        // dd($res);
        return view('admin/cates/index',[
            'res'=>$res,
            'num'=>$num,
            'search'=>$search,
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
        $res = AdminCate::select(DB::raw('*,concat(path,cid) as paths'))->orderBy('paths')->get();
        // dd($res);
        foreach($res as $k=>$v){
            $foo = explode(',',$v->path);
            // dd($foo);
            $level = count($foo)-2;
            // dd($level);
            $v->cname = str_repeat('&nbsp;',$level*8).'|--'.$v->cname;
        }
        // dd($res);
        return view('admin/cates/add',['res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestForm $req)
    {
        // dd('11');
        $res = $req->except('_token');
        if($res['pid']=='0'){
            $res['path'] = '0,';
        }else{
            $data = AdminCate::where('cid',$res['pid'])->first();
            // dd($data->path);
            $res['path'] = $data->path.$data->cid.',';
        }
        try{
            AdminCate::create($res);
        }catch(\Exception $e){
            return back();
        }

            return redirect('admin/cate');
       
        // dd($res);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {    
        $res = AdminCate::find($id);
        // dd($res);
        return view('admin/cates/edit',['res'=>$res]);
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
        // echo $id;
        $res = $req->except('_token','_method');
        // dd($res);
        try{
         AdminCate::where('cid',$id)->update($res);
        }catch(\Exception $e){

            return back();
        }
            return redirect('admin/cate');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $arr = [];
        $zilei  = getzileisub($arr,$id);
        $merchant = AdminMerchant::where('cid',$id)->first();
        if($zilei||$merchant){
             return back()->with('msg','该类中包含子类或商家');
        }
        try{
          AdminCate::where('path','like','%,'.$id.',%')->delete();
          AdminCate::where('cid',$id)->delete();
        }catch(\Exception $e){
            // dd ($e);
            return back();
        }
            return redirect('admin/cate');
            
       

    }
}
