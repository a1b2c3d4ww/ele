<?php


namespace App\Http\Controllers\admin;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use App\Http\Requests\admin\admins\RequestForm;
use App\Http\Requests\admin\admins\UpdateForm;
// use App\Http\RequestsRequestFrom;
// use App\Http\RequestsUpdateFrom;
use App\AdminUser;
use App\AdminReviews;
use App\AdminOrders;
use Hash;

class UserController extends Controller
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
        $all = AdminUser::get()->toArray();
        // dd($all);
        $count = count($all);
     
        $condition = [];
        if(!empty($req->input('search'))){
            $condition[] = ['aname','like','%'.$req->input('search').'%'];
        }
        if(!(empty($req->input('auth')))){
            $condition[] = ['auth','=',$req->input('auth')];
        }
        $res = AdminUser::
        where($condition)->
        orderBy('aid','asc')->
        paginate($req->input('num',5));
        // dd($req->input('num',10));
        // $count()
        $num = $req->input('num',5);
        $search = $req->input('search');
        $auth = $req->input('auth');
        // dd($res);
        // dd($res);
      
        return view('admin/admins/index',[
            'res'=>$res,
            'arr'=>$arr,
            'num'=>$num,
            'search'=>$search,
            'auth'=>$auth,
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


        return view('admin/admins/add');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(RequestForm $req)
    {
           $res = $req->except('_token','repass');
           $res['ctime'] = time();
           $res['password'] = Hash::make($req->input('password'));
            // Hash::make($req->input('password'));
           // dd($res);
           // $data = AdminUser::create($res);
           // dd($data);
            

           try{
           
                AdminUser::create($res);

        }catch(\Exception $e){
            return back()->with('warning','添加失败');
           
             // dd($data);
        }
            return redirect('/admin/user')->with('msg','添加成功');




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


        $res = AdminUser::find($id);
        // dd($res);
        return view('admin/admins/edit',['res'=>$res]);






    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(UpdateForm $req, $id)
    {
        // dd($req->all());
        $res = $req->except('_token','_method','repass');
        // dd($res);
        try{
              AdminUser::where('aid',$id)->update($res);


        }catch(\Exception $e){
            return back()->with('warning','修改失败');
           
             // dd($data);
        }
            return redirect('/admin/user')->with('msg','修改成功');
            




   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
    public function destroy($id)
    {


        try{
               AdminUser::where('uid',$id)->delete();
      

        }catch(\Exception $e){
            return back()->with('warning','删除失败');
        }
                 
            
           
              return redirect('/admin/user')->with('msg','删除成功');
       
    }
}