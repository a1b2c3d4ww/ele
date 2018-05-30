@extends('layout.admin')

@section('title','菜品添加')

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
           	菜品添加
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
        <form  class="mws-form" action="/admin/green/store" method="post"  enctype="multipart/form-data">
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;">
            </div>
            <div class="mws-form-inline">

                  <div class="mws-form-row">

                    <label class="mws-form-label">
                        所属商家
                    </label>

                    <div class="mws-form-item">
                        <input type="text" name="mname" readonly value="{{getmName($mid)}}" class="required small">
                    </div>
                </div>
                <div class="mws-form-row">

                    <label class="mws-form-label">
                        菜品分类
                    </label>

                    <div class="mws-form-item">
                        <input type="text" name="fname" readonly value="{{getfName($fid)}}" class="required small">
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">
                        菜品名称
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="gname"  value="" class="required small">
                    </div>
                </div>
                <div class="mws-form-row">
                     <label class="mws-form-label">
                        菜品价格
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="price"  value="" class="required small"> 元
                    </div>
                </div>
                <div class="mws-form-row" style="width: 650px;">
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
                                            <input type="radio" value="1" name="status" checked>上架
                                            <input type="radio" value="0"  name="status">下架
                                    </div>
                                </div>
              <div class="mws-form-row">
                            <label class="mws-form-label">菜品详情 </label>
                            <div class="mws-form-item">
                                <textarea name="details" rows="" cols="" class="required large"></textarea>
                            </div>
                </div>
                    <div class="mws-button-row">
                <center> <input type="submit" value="添加" class="btn btn-danger"></center>
            </div>
                </div>  
                <input type="hidden" name="mid" value="{{$mid}}"> 
                <input type="hidden" name="fid" value="{{$fid}}"> 
              {{ csrf_field() }}
             
            </div>
            
        </form>
    </div>
</div>

@endsection