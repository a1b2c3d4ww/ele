<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\greens\RequestForm;

use App\AdminGreen;
class GreenController extends Controller
{
    public function create($id1,$id2)
    {
    	  return view('admin/greens/add',['mid'=>$id1,'fid'=>$id2]);  
    }
     public function store(RequestForm $req)
    {
    		
        $res = $req->except('_token');
        // dd($res);
        // dd($req->file('gpic'));
       if($req->file('gpic')){
            $name = time().'_'.rand(1111,9999);
            // dd($name);
             $suffix = $req->file('gpic')->getClientOriginalExtension(); 
             $path = $req->file('gpic')->move('./gpic', $name.'.'.$suffix);
             $res['gpic']='/gpic/'.$name.'.'.$suffix;
        }
            
            // dd($res);
                
        try{
            AdminGreen::create($res);
        }catch(\Exception $e){
            return back()->with('添加失败');
        }
            return redirect('admin/green/index');

    }
    public function index(Request $req)
    {

         $condition = [];
        if(!empty($req->input('catesearch'))){
            $condition[] = ['fname','like','%'.$req->input('catesearch').'%'];
        }
        if(!(empty($req->input('mnamesearch')))){
           $condition[] = ['mname','like','%'.$req->input('mnamesearch').'%'];
        }
        if(!(empty($req->input('gnamesearch')))){
           $condition[] = ['gname','like','%'.$req->input('gnamesearch').'%'];
        }   
           $res = AdminGreen::orderBy('mid')
         ->where($condition)
         ->paginate($req->input('num',10));
         // dd($res);
         // dd($res);
        $count =  count(AdminGreen::all());
        $num = $req->input('num',10);
        $catesearch = $req->input('catesearch');
        $mnamesearch = $req->input('mnamesearch');
        $gnamesearch = $req->input('gnamesearch');
        return view('admin/greens/index',[
            'res'=>$res,
            'catesearch'=>$catesearch,
            'mnamesearch'=>$mnamesearch,
            'gnamesearch'=>$gnamesearch,
            'count'=>$count,
            'num'=>$num
        ]);
    }
     public function edit($id)
    {
        
        $res = AdminGreen::find($id);
        // dd($res);
        return view('admin/greens/edit',['res'=>$res]);
    }
    public function update(Request $req, $id)
    {
         $data = AdminGreen::where('gid',$id)->first();
        $res =  $req->except('_token','_method');
        if($req->gpic){

            $name = time().'_'.rand(1111,9999);

            $suffix = $req->file('gpic')->getClientOriginalExtension(); 

            $path = $req->file('gpic')->move('./gpic', $name.'.'.$suffix);
             // dd($req->gpic);
            $res['gpic'] = '/gpic/'.$name.'.'.$suffix;
            // dd($data['gpic']);
            if($data['gpic']){
                if(file_exists('.'.$data['gpic'])){
                    // dd('sss');
                    unlink('.'.$data->gpic);
               }
            }
            
        }
        // dd($res);
         try{
             AdminGreen::where('gid',$id)->update($res);
         }catch(\Exception $e){
            return back()->with('msg','修改失败');
         }
            return redirect('admin/green/index');
    }
    public function delete($id)
    {
       
          try{
         
          AdminGreen::where('gid',$id)->delete();
        }catch(\Exception $e){
            
            return back()->with('msg','删除失败');
        }
            return redirect('admin/green/index');

    }
}
