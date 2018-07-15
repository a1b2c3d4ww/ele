<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminGreencate;
use App\Http\Requests\admin\greencates\RequestForm;
use App\AdminGreen;
class GreencateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
    	
    	$condition = [];
        if(!empty($req->input('catesearch'))){
            $condition[] = ['fname','like','%'.$req->input('catesearch').'%'];
        }
        if(!(empty($req->input('namesearch')))){
           $condition[] = ['mname','like','%'.$req->input('namesearch').'%'];
        }
        	
           $res = AdminGreencate::orderBy('mid','desc')
         ->where($condition)
         ->paginate($req->input('num',10));
         // dd($res);
         // dd($res);
        $count =  count(AdminGreencate::all());
        $num = $req->input('num',10);
        $catesearch = $req->input('catesearch');
        $namesearch = $req->input('namesearch');
        // dd($res);
        return view('admin/greencates/index',[
            'res'=>$res,
            'catesearch'=>$catesearch,
            'namesearch'=>$namesearch,
            'count'=>$count,
            'num'=>$num
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('admin/greencates/add',['mid'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestForm $req)
    {
    	
        $res = $req->except('_token');
    
         AdminGreencate::create($res);
        try{
           
        }catch(\Exception $e){
            return back()->with('msg','添加失败');
        }
            return redirect('admin/merchant');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 		
        $res = AdminGreencate::find($id);
        // dd($res);
        return view('admin/greencates/edit',['res'=>$res]);
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
         $res = $req->except('_token');
        // dd($res);
        try{
         AdminGreencate::where('fid',$id)->update($res);
        }catch(\Exception $e){

            return back()->with('msg','修改失败');
        }
            return redirect('admin/greencate/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         $greens = AdminGreen::where('fid',$id)->first();
         // dd($greens);
         if($greens){
            return back()->with('msg','该分类下包含菜品');
         }
          try{
         
          AdminGreencate::where('fid',$id)->delete();
        }catch(\Exception $e){
            
            return back()->with('msg','删除失败');
        }
            return redirect('admin/greencate/index');

    }
}
