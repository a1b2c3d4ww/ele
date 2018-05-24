@extends('layout.admin')

@section('title','商家分类添加')

@section('content')
  
	<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-ok">
            </i>
           	商家分类添加
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
        <form  class="mws-form" action="/admin/greencate/update/{{$res->fid}}" method="post"  >
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;">
            </div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        分类名称
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="fname" value="{{$res->fname}}" class="required small">
                    </div>
                </div>  
              {{ csrf_field() }}
             
            </div>
            <div class="mws-button-row">
                <center> <input type="submit" value="添加" class="btn btn-danger"></center>
            </div>
        </form>
    </div>
</div>

@endsection