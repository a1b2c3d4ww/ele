@extends('layout.admin')

@section('title','菜品修改')

@section('content')
  @if (count($errors) > 0)
            <div class="mws-form-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style='color:blue;font-size:17px;list-style:none'>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
	<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-ok">
            </i>
           	菜品修改
        </span>
    </div>
      @if(session('msg'))
    <div class="mws-form-message error">
        <ul>
            <li style="list-style: none;">{{session('msg')}}</li>
        </ul>
        
    </div>

    @endif
    <div class="mws-panel-body no-padding">
        <form  class="mws-form" action="/admin/green/update/{{$res->gid}}" method="post"  enctype="multipart/form-data">
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;">
            </div>
            <div class="mws-form-inline">

                  <div class="mws-form-row">

                    <label class="mws-form-label">
                        所属商家
                    </label>

                    <div class="mws-form-item">
                        <input type="text" name="mname" readonly value="{{$res->mname}}" class="required small">
                    </div>
                </div>
                <div class="mws-form-row">

                    <label class="mws-form-label">
                        菜品分类
                    </label>

                    <div class="mws-form-item">
                        <input type="text" name="fname" readonly value="{{$res->fname}}" class="required small">
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        菜品名称
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="gname"  value="{{$res->gname}}" class="required small">
                    </div>
                </div>
                <div class="mws-form-row">
                     <label class="mws-form-label">
                        菜品价格
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="price"  value="{{$res->price}}" class="required small"> 元
                    </div>
                </div>
                <div class="mws-form-row" style="width: 650px;">
                    <center><img src="{{$res->gpic}}" style="width: 200px;height: 100px;border-radius: 20%"></center><br>
                     <label class="mws-form-label">
                        菜品图片
                    </label>
                        
                        <div class="mws-form-item">
                            <input type="file" name="gpic">
                        </div>
                 </div>  
                    <div class="mws-form-row">
                                    <label class="mws-form-label">状态</label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <input type="radio" value="1" @if($res->status=='1') checked @endif name="status" checked>上架
                                            <input type="radio" value="0" @if($res->status=='0') checked @endif  name="status">下架
                                    </div>
                                </div>
              <div class="mws-form-row">
                            <label class="mws-form-label">菜品详情 </label>
                            <div class="mws-form-item">
                                <textarea name="details" rows="" cols="" class="required large">{{$res->details}}</textarea>
                            </div>

                </div>
           <div class="mws-button-row">
                <center> <input type="submit" value="提交" class="btn btn-danger"></center>
            </div>
                </div>  
              {{ csrf_field() }}
             
            </div>
           
        </form>
    </div>
</div>

@endsection