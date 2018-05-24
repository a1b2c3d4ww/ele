@extends('layout.admin')

@section('title','商家分类添加')

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
           	商家分类添加
        </span>
    </div>
    <div class="mws-panel-body no-padding">
        <form  class="mws-form" action="/admin/cate" method="post"  >
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;">
            </div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        分类名称
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="cname" class="required small">
                    </div>
                </div>
             
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        父类名称
                    </label>
                    <div class="mws-form-item">
                        <select class="required small" name="pid">
                            <option value="0">
								请选择
                            </option>
                            @foreach($res as $k=>$v)
                            <option value="{{$v->cid}}">
                                {{$v->cname}}
                            </option>
                          	@endforeach
                        </select>
                    </div>
                </div>
               
              {{ csrf_field() }}
             
            </div>
            <div class="mws-button-row">
                <center> <input type="submit" class="btn btn-danger"></center>
            </div>
        </form>
    </div>
</div>

@endsection