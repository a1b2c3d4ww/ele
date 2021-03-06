@extends('layout.admin')

@section('title','菜品分类添加')

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
               	菜品分类添加
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
        <form  class="mws-form" action="/admin/greencate/store" method="post"  >
            <div id="mws-validate-error" class="mws-form-message error" style="display:none;">
            </div>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">
                        分类名称
                    </label>
                    <div class="mws-form-item">
                        <input type="text" name="fname" class="required small">
                    </div>
                </div>  
                <input type="hidden" name="mid" value="{{$mid}}"> 
                <input type="hidden" name="mname" value="{{getmName($mid)}}"> 
              {{ csrf_field() }}
             
            </div>
            <div class="mws-button-row">
                <center> <input type="submit" value="添加" class="btn btn-danger"></center>
            </div>
            
        </form>
    </div>

</div>
@endsection