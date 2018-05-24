<?php 

	function getName($pid)
	{

		if($pid == '0'){

			return '根类';
		} else {

			$res = DB::table('take_cates')->where('cid',$pid)->first();

			return $res->cname;
		}
	}
	function getmName($mid)

	{        

			$res = DB::table('take_merchants')->where('mid',$mid)->first();

			return $res->mname;
		
	}
    // function getmPic($mid)
    // {        
    //         $res = DB::table('take_merchants')->where('mid',$mid)->first();

    //         return $res->mpic;
        
    // }

	function getfName($fid)
	{
			$res = DB::table('take_greencates')->where('fid',$fid)->first();
			return $res->fname;
		
	}
    function getGreens($fid)
    {
            $res = DB::table('take_greens')->where('fid',$fid)->get();
            return $res;
        
    }
	 function getlevelcates($data, $pid=0)
    {
    	$newArr = array();
    	//获取数据
    	foreach ($data as $k => $v) {
    		# code...
    		
    		if ($v->pid == $pid) {
    			# code...
    			$v->sub =  getlevelcates($data, $v->cid);	
    			$newArr[$v->cid] = $v;
    			
    		}
    		
    	}
    	return $newArr;
    }
   
     function getzileisub(&$arr,$cid=0)
    {  
    	
  	  	$cates = DB::table('take_cates')->get();

        foreach ($cates as $k=>$v){
           if($v->pid==$cid){
          
            $arr[] = $v->cid;

        	getzileisub($arr,$v->cid);

           }
        }
        return $arr;
    }
    function getuName($id)
	{
			$res = DB::table('take_users')->where('uid',$id)->first();
			return $res;	
	}

	function getgName($gid)
	{
			$res = DB::table('take_greens')->where('gid',$gid)->first();
			return $res;	
	}
	function getuPic($id)
	{
			$res = DB::table('take_users')->where('uid',$id)->first();
			return $res->upic;	
	}
	function  getdetails($id)
	{	
		
		$res = DB::table('take_details')->where('oid',$id)->get();
		// dd($res);
		return $res;
	}
	function  getmid($id)
	{	

		$res = DB::table('take_merchants')->where('mid',$id)->first();
		// dd($res);
		return $res;
	}

 ?>