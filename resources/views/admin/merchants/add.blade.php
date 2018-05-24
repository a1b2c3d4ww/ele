@extends('layout.admin')
@section('title','商家添加')
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

        @if (session('warning'))
     <div class="mws-form-message error">
        {{ session('warning') }}
        </div>
         @endif
				<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-ok"></i>添加商家</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form  class="mws-form" action="/admin/merchant" method="post" enctype="multipart/form-data">
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label">商家分类</label>
                                    <div class="mws-form-item">
                                        <select class="required small " name="cid">
                                            <option value="0">根类</option>
                                            @foreach($res as $k=>$v)
                                            <option value="{{$v->cid}}">{{$v->cname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">商家名称</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="mname" class="required small">
                                    </div>
                                </div>
                            	
                               
                                    	<div class="mws-form-row" style="width: 650px;">
                                                <label class="mws-form-label">店家图片</label>
                                                <div class="mws-form-item">
                                                    <input type="file" name="mpic">
                                                </div>
                                            </div>
                            	
                            	<div class="mws-form-row">
                                    <label class="mws-form-label">安全标识</label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                             <input type="radio" value="1" name="safe"   checked>有
                                              <input type="radio" value="0" name="safe">无
                                        </ul>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">发票标识</label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <input type="radio" value="1" name="bill"   checked>有
                                              <input type="radio" value="0" name="bill">无
                                        </ul>
                                    </div>
                                </div>
                                 <div class="mws-form-row">
                                    <label class="mws-form-label">状态</label>
                                    <div class="mws-form-item">
                                        <ul class="mws-form-list">
                                            <input type="radio" value="1" name="status" checked>新店
                                            <input id="gender_female" value="2" type="radio" name="status"> 营业
                                            <input id="gender_male" type="radio" name="status" value="0"> 停业
                                        </ul>
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                    <label class="mws-form-label">简介 <span class="required"></span></label>
                                    <div class="mws-form-item">
                                        <textarea name="details" rows="" cols="" class="required large"></textarea>
                                    </div>
                                </div>
                            	 {{ csrf_field() }}
                    			
                            </div>
                            <div class="mws-button-row ">
                            	<center><input type="submit" class="btn btn-danger"></center>
                            </div>
                        </form>
                    </div>    	
                </div>
@endsection

@section('js')
<script>

    $('.mws-form-message').delay(3000).slideUp(1000);

</script>

@endsection