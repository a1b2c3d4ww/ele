@extends('layout.admin')

@section('title',$title)

  @section('content')              
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-ok"></i>{{$title}}</span>
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
                             <form action="/admin/adver" method='post' class="mws-form" enctype='multipart/form-data'>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">排序</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name='sort' class="small">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">链接</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name='lname' class="small">
                                    </div>
                                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">轮播图片</label>
                    <div class="mws-form-item">
                        <input type="file" name='lpic' readonly="readonly" style="width: 100%; padding-right: 85px;" class="fileinput-preview" placeholder="No file selected...">
                    </div>
                </div>
                  <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name='status' value='1' > <label>启用</label></li>
                            <li><input type="radio" name='status' value='0' checked> <label>禁用</label></li>
                            
                            
                        </ul>
                    </div>
                </div>   	
                    			
                            </div>
                            <div class="mws-button-row">
                                {{csrf_field()}}
                            	<input type="submit" class="btn btn-danger" value="提交">
                            </div>
                        </form>
                    </div>    	
                </div>
                
                <!-- Panels End -->
            </div>
@endsection

@section('js')
<script>
    $('.mws-form-message').delay(3000).slideUp(1000);

</script>

@endsection
