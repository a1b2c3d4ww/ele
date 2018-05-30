<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogPost;
use App\Http\Requests\FormUpdate;
use App\AdminMember;
use App\AdminUser;
use App\AdminReviews;
use App\AdminOrders;


use Hash;



class EleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        
        $arr = $req->all();
        //获取数据
        $condition = [];
        if(!empty($req->input('search'))){
            $condition[] = ['uname','like','%'.$req->input('search').'%'];
        }
        $res = AdminMember::where($condition)->orderBy('uid','asc')-> paginate($req->input('num',10));    

          $num = $req->input('num');
        $search = $req->input('search');
        $count =  count(AdminMember::all());

         return view('admin.user.index',[

            'title'=>'用户列表',
            'res'=>$res,
            'num'=>$num,
            'search'=>$search,
            'count'=>$count,
            'request'=>$arr  

        ]);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.user.member',['title'=>'用户的添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $req)
    {


        $res = $req->except('_token','repass');
        // dd($req->file('upic'));
        if($req->hasFile('upic'))
        {
            //文件名
            $name = rand(1111,9999).'.'.time();
            //获取后缀
            $suffix = $req->file('upic')->getClientOriginalExtension();
            //移动到哪去
            $path = $req->file('upic')->move('./upload/',$name.'.'.$suffix);



        // dd($res);
        //存到数据表中
        $res['upic'] = '/upload/'.$name.'.'.$suffix;
        //对密码加密

        $res['password'] =  Hash::make($req->input('password'));

        $res['ctime'] = time();
        }
        
     
          try{
             AdminMember::insert($res);
         }catch(\Exception $e){
            return back()->with('msg','修改失败');
         }
            return redirect('admin/member');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Ajax(Request $req)
    {
        //
          $id = $req->input('uid');

        $uname['uname'] = $req->input('uname');

        $res = AdminMember::where('uid',$id)->update($uname);

        if($res){

            echo 1;
        } else {

            echo 0;
        }  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $res = AdminMember::where('uid',$id)->first();
        return view('admin.user.edit',[
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
    public function update(FormUpdate $req, $id)
    {
        //表单验证

        $data = AdminMember::where('uid',$id)->first();
        $res =  $req->except('_token','_method');
        if($req->upic){
            $name = time().'_'.rand(1111,9999);
            $suffix = $req->file('upic')->getClientOriginalExtension(); 
            $path = $req->file('upic')->move('./upload', $name.'.'.$suffix);
            $res['upic'] = '/upload/'.$name.'.'.$suffix;
             if($data['upic']){

                if(file_exists('.'.$data['upic'])){

                    unlink('.'.$data->upic);
               }
        }
    }

       try{
           AdminMember::where('uid',$id)->update($res);
        }catch(\Exception $e){
           return back()->with('msg','修改失败');
        }
       return redirect('/admin/member');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // echo 111;
        
        $req = AdminMember::where('uid',$id)->first();

            if($req['upic']){
                $data = $req->upic;
                if(file_exists('.'.$data)){
                 $file = unlink('.'.$data);  // true   false
                }

            }

           try{
          AdminMember::where('uid',$id)->delete();
        }catch(\Exception $e){
             
           return back()->with('msg','修改失败');
        }
         AdminOrders::where('uid',$id)->delete();
        AdminReviews::where('uid',$id)->delete();
       return redirect('/admin/member');

     }
}
