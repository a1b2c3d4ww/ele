@extends('layout.admin')

@section('title','商家修改')


@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span ><i class="icon-list-2"></i> 商家修改</span>
    </div>
    <div class="mws-panel-body no-padding">
        
        @if (count($errors) > 0)
            <div class="mws-form-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style='color:blue;font-size:17px;list-style:none'>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
          @if (session('warning'))
     <div class="mws-form-message error">
        {{ session('warning') }}
        </div>
          @endif
       <form  class="mws-form" action="/admin/merchant/{{$data->mid}}" method="post" enctype="multipart/form-data">
                            <div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">商家分类</label>
                                    <div class="mws-form-item">
                                        <select class="required small " name="cid">
                                            <option value="0">根类</option>
                                            @foreach($res as $k=>$v)
                                            <option value="{{$v->cid}}" @if($cid==$v->cid) selected @endif >{{$v->cname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">商家名称</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="mname" class="required small" value="{{$data->mname}}">
                                    </div>
                                </div>
                                
                               
                                <div class="mws-form-row" style="width: 650px;">
                                        <label class="mws-form-label">店家图片</label>
                                         <center><img src="{{$data->mpic}}" style="width: 200px;height: 100px;border-radius: 20%"></center>
                                        <div class="mws-form-item">
                                            <input type="file" name="mpic">
                                        </div>
                                    </div>
                                
                                <div class="mws-form-row">
                                    <label class="mws-form-label">安全标识</label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                             <input type="radio" value="1" name="safe" @if($data->safe==1) checked @endif >有
                                              <input type="radio" value="0" name="safe" @if($data->safe==0) checked @endif >无
                                        </ul>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">发票标识</label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <input type="radio" value="1" name="bill" @if($data->bill==1) checked @endif  >有
                                              <input type="radio" value="0" name="bill" @if($data->bill==0) checked @endif  >无
                                        </ul>
                                    </div>
                                </div>
                                 <div class="mws-form-row">
                                    <label class="mws-form-label">状态</label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <input type="radio" value="1" @if($data->status==1) checked @endif name="status">新店
                                            <input id="gender_female" value="2" type="radio"
                                            @if($data->status==2) checked @endif name="status"> 营业
                                            <input id="gender_male" type="radio" name="status" @if($data->status==0) checked @endif class="required" value="0"> 停业
                                        </ul>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">简介 <span class="required"></span></label>
                                    <div class="mws-form-item">
                                        <textarea name="details" rows="" cols="" class="required large">{{$data->details}}</textarea>
                                    </div>
                                </div>
                               {{method_field('PUT')}}
                               {{csrf_field()}}
                                
                            </div>
                            <div class="mws-button-row ">
                                <center><input type="submit" class="btn btn-danger"></center>
                            </div>
    </div>      
</div>

@endsection

@section('js')
<script>
    /*setTimeout(function(){

        $('.mws-form-message').slideUp(1000);

    },3000)
*/
    $('.mws-form-message').delay(3000).slideUp(1000);

</script>

@endsection