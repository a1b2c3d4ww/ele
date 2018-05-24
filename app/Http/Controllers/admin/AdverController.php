<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdverRequest;
use App\Http\Requests\AdverupdateRequest;
use App\AdminAdver;

class AdverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {     
        // echo 11;
        
         $arr = $req->all();


        //获取数据
        //
         $condition = [];
        if(!empty($req->input('search'))){
            $condition[] = ['lname','like','%'.$req->input('search').'%'];
        }
        $res = AdminAdver::where($condition)->orderBy('lid','asc')-> paginate($req->input('num',10));    
        $count =  count(AdminAdver::all());

        $num = $req->input('num');
        $search = $req->input('search');

        return view('admin.adve.index',[
            'title'=>'轮播列表',
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
        return view('admin.adve.member',['title'=>'轮播添加']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdverRequest $req)
    {
        //
         $res = $req->except('_token');
        if($req->hasFile('lpic'))
        {
            //文件名
            $name = rand(1111,9999).'.'.time();
            //获取后缀
            $suffix = $req->file('lpic')->getClientOriginalExtension();
            //移动到哪去
            $path = $req->file('lpic')->move('./upload/',$name.'.'.$suffix);
            $res['lpic'] = '/upload/'.$name.'.'.$suffix;
        }

       
        // dd($res);

        //存到数据表中
        
        //对密码加密
       
         try{
           AdminAdver::insert($res);
        }catch(\Exception $e){
          return back()->with('msg','添加失败');
        }
       return redirect('/admin/adver');

    }


     public function adverAjax(Request $req)
    {
        //
          $id = $req->input('lid');

        $uname['lname'] = $req->input('lname');

        $res = AdminAdver::where('lid',$id)->update($uname);

        if($res){

            echo 1;
        } else {

            echo 0;
        }  
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
        //
          $res = AdminAdver::where('lid',$id)->first();
        return view('admin.adve.edit',[
            'title'=>'用户的修改页面',
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
    public function update(AdverupdateRequest $req, $id)
    {
        //
        
        $data = AdminAdver::where('lid',$id)->first();
        $res =  $req->except('_token','_method');
        if($req->lpic){
            $name = time().'_'.rand(1111,9999);
            $suffix = $req->file('lpic')->getClientOriginalExtension(); 
            $path = $req->file('lpic')->move('./upload', $name.'.'.$suffix);
            $res['lpic'] = '/upload/'.$name.'.'.$suffix;
          
            if(!file_exists('.'.$data->lpic)){
            unlink('.'.$data->lpic);
             }
        }
        // dd($res);
         try{
             AdminAdver::where('lid',$id)->update($res);
         }catch(\Exception $e){
            return back()->with('msg','修改失败');
         }
            return redirect('admin/adver');
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
        // echo 11;
            $req = AdminAdver::where('lid',$id)->first();

            if($req['lpic']){
                $data = $req->lpic;
                if(file_exists('.'.$data)){
                 $file = unlink('.'.$data);  // true   false
                }
            }

           try{
           AdminAdver::where('lid',$id)->delete();
        }catch(\Exception $e){
           return back()->with('msg','删除失败');
        }
       return redirect('/admin/adver');
    }
      public function up($id, $status=1)
    {
        echo 11;
    //     $data['status'] = $status;
    //     AdminAdver::update($data, ['lid'=>$id], true);

    //     return redirect('admin/adver');    
    }

  
    // public function down($id)
    // {
    //     // 调用某个模块下某个控制器
    //     return action('member/AdverController/up',['lid'=>$id, 'status'=>'2']);
    // }
}
