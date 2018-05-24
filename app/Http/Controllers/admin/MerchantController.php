<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\merchants\RequestForm;
use App\AdminCate;
use App\AdminMerchant;
use App\AdminGreencate;
use DB;
class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        $arr = $req->all();
        // $data = AdminUser::all();
        // dd($data);
        // return view('admin/index',['data'=>$data]);
        $all = AdminMerchant::get()->toArray();
        // dd($all);
        $count = count($all);
     
        $condition = [];
        if(!empty($req->input('search'))){
            $condition[] = ['mname','like','%'.$req->input('search').'%'];
        }
        $res = AdminMerchant::
        where($condition)->
        orderBy('mid','asc')->
        paginate($req->input('num',10));
        // dd($req->input('num',10));
        // $count()
        $num = $req->input('num',10);
        $search = $req->input('search');

        // dd($res);
        return view('admin/merchants/index',
            [
                'num'=>$num,
                'res'=>$res,
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
        foreach($res as $k=>$v){
            $foo = explode(',',$v->path);
            $level = count($foo)-2; 
            $v->cname = str_repeat('&nbsp;',$level*8).'|--'.$v->cname;
        } 
        // dd($errors);
        return view('admin/merchants/add',['res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestForm $req)
    {
         // dd($req->file('mpic')); 
         $data = $req->except('_token');
        if($req->file('mpic')){
            $name = time().'_'.rand(1111,9999);
             $suffix = $req->file('mpic')->getClientOriginalExtension(); 
             $path = $req->file('mpic')->move('./mpic', $name.'.'.$suffix);
              $data['mpic']='/mpic/'.$name.'.'.$suffix;
        }
            
           
            // dd($data);
               
        try{
             AdminMerchant::create($data);
        }catch(\Exception $e){
            return back();
        }
            return redirect('admin/merchant');

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
        $res = AdminCate::select(DB::raw('*,concat(path,cid) as paths'))->orderBy('paths')->get();
        foreach($res as $k=>$v){
            $foo = explode(',',$v->path);
            $level = count($foo)-2; 
            $v->cname = str_repeat('&nbsp;',$level*8).'|--'.$v->cname;
        } 
         $data = AdminMerchant::find($id);
         $cid = $data['cid'];
         // dd($data->mname);
        return view('admin/merchants/edit',['res'=>$res,'data'=>$data,'cid'=>$cid]);
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
        $data = AdminMerchant::where('mid',$id)->first();
        $res =  $req->except('_token','_method');
        if($req->mpic){
            $name = time().'_'.rand(1111,9999);
            $suffix = $req->file('mpic')->getClientOriginalExtension(); 
            $path = $req->file('mpic')->move('./mpic', $name.'.'.$suffix);
            $res['mpic'] = '/mpic/'.$name.'.'.$suffix;
          

            if($data['mpic']){

                if(file_exists('.'.$data['mpic'])){
                    // dd('sss');
                    unlink('.'.$data->mpic);
               }
           }
        }
        // dd($res);
         try{
             AdminMerchant::where('mid',$id)->update($res);
         }catch(\Exception $e){
            return back()->with('msg','修改失败');
         }
            return redirect('admin/merchant');
           

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo '111';
        $greencates = AdminGreencate::where('mid',$id)->first();
        if($greencates){
            return back()->with('msg','该商家包含菜单分类');
        }
        $req = AdminMerchant::where('mid',$id)->first();


            if($req->mpic){
                $data = $req->mpic;
            }    
            if(file_exists('.'.$data)){
                 $file = unlink('.'.$data); 
             }
            

        try{
             $res = AdminMerchant::where('mid',$id)->delete();

         }catch(\Exception $e){
            return back()->with('删除失败');
         }
            
            return redirect('admin/merchant');
      
    }
}
