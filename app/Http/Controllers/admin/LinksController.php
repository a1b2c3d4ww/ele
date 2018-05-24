<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRequest;
use App\Http\Requests\LinksRequest;

use App\AdminLinks;
class LinksController extends Controller
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
        //
         $condition = [];
        if(!empty($req->input('search'))){
            $condition[] = ['yname','like','%'.$req->input('search').'%'];
        }
        $res = AdminLinks::where($condition)->orderBy('yid','asc')-> paginate($req->input('num',10));    
        $count =  count(AdminLinks::all());

        $num = $req->input('num');
        $search = $req->input('search');

        return view('admin.link.index',[
            'title'=>'链接列表',
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
        return view('admin.link.member',['title'=>'友情链接']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IndexRequest $req)
    {
        //
           $res = $req->except('_token');
        // dump($req->all());
         if($req->hasFile('ypic'))
        {
            //文件名
            $name = rand(1111,9999).'.'.time();
            //获取后缀
            $suffix = $req->file('ypic')->getClientOriginalExtension();
            //移动到哪去
            $path = $req->file('ypic')->move('./upload/',$name.'.'.$suffix);
            $res['ypic'] = '/upload/'.$name.'.'.$suffix;
        }
           
        //存到数据表中
        

        try{
           AdminLinks::insert($res);
        }catch(\Exception $e){
          return back()->with('msg','添加失败');
        }
       return redirect('/admin/links');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function linksAjax(Request $req)
    {
        $yid = $req->input('yid');

        $ylinks['ylinks'] = $req->input('ylinks');

        $res = AdminLinks::where('yid',$yid)->update($ylinks);

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
        //
        $res = AdminLinks::where('yid',$id)->first();
        return view('admin.link.edit',[
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
    public function update(LinksRequest $req, $id)
    {
        //
        $data = AdminLinks::where('yid',$id)->first();
        $res =  $req->except('_token','_method');
          if($req->ypic){
            $name = time().'_'.rand(1111,9999);
            $suffix = $req->file('ypic')->getClientOriginalExtension(); 
            $path = $req->file('ypic')->move('./upload', $name.'.'.$suffix);
            $res['ypic'] = '/upload/'.$name.'.'.$suffix;
          
            if(!file_exists('.'.$data->mpic)){
            unlink('.'.$data->mpic);
             }
        }
       
         try{
           AdminLinks::where('yid',$id)->update($res);
        }catch(\Exception $e){
           return back()->with('msg','添加失败');
        }
       return redirect('/admin/links');
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
          $req = AdminLinks::where('yid',$id)->first();

            if($req['ypic']){
                $data = $req->ypic;
                if(file_exists('.'.$data)){
                 $file = unlink('.'.$data);  // true   false
                }

            }

         try{
          AdminLinks::where('yid',$id)->delete();
        }catch(\Exception $e){
           return back()->with('msg','添加失败');
        }
       return redirect('/admin/links');
    }

}
