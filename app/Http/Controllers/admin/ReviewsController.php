<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AdminReviews;
class ReviewsController extends Controller
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
         $condition = [];
        if(!empty($req->input('search'))){
            $condition[] = ['rid','like','%'.$req->input('search').'%'];
        }

        $res = AdminReviews::where($condition)->orderBy('mid','asc')-> paginate($req->input('num',10));    
        $count =  count(AdminReviews::all());
        
        $num = $req->input('num');
        $search = $req->input('search');
// dd($res);
        return view('admin.reviews.index',[
            'title'=>'评论列表',
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
    public function store(Request $request)
    {
        //
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
         $req = AdminReviews::where('rid',$id)->first();

         try{
          AdminReviews::where('rid',$id)->delete();
        }catch(\Exception $e){
           return back()->with('msg','添加失败');
        }
       return redirect('/admin/reviews');
    }
}
