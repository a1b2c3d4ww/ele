
@extends('layout.admin')

@section('title',$title)


@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        
      <!--   @if (count($errors) > 0)
            <div class="mws-form-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style='color:blue;font-size:17px;list-style:none'>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif -->
        <form action="/admin/orders/{{$res->oid}}" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">订单ID</label>
                    <div class="mws-form-item">
                        <input type="text" name='oid' class="small" value="{{$res->oid}}">
                    </div>
                </div>
                  <div class="mws-form-row">
                    <label class="mws-form-label">购买时间</label>
                    <div class="mws-form-item">
                        <input type="text" name='otime' class="small" value="{{$res->otime}}">
                    </div>
                </div>
                  <div class="mws-form-row">
                    <label class="mws-form-label">总金额</label>
                    <div class="mws-form-item">
                        <input type="text" name='sum' class="small" value="{{$res->sum}}">
                    </div>
                </div>
                   <div class="mws-form-row">
                    <label class="mws-form-label">留言</label>
                    <div class="mws-form-item">
                        <input type="text" name='details' class="small" value="{{$res->details}}">
                    </div>
                </div>
                   <div class="mws-form-row">
                    <label class="mws-form-label">菜品总数</label>
                    <div class="mws-form-item">
                        <input type="text" name='cnt' class="small" value="{{$res->cnt}}">
                    </div>
                </div>
                 <div class="mws-form-row">
                    <label class="mws-form-label">状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name='status' value='0' @if($res->status ==0 ) checked @endif> <label>新订单</label></li>
                            <li><input type="radio" name='status' value='1' @if($res->status ==1 ) checked @endif> <label>已发货</label></li>
                            <li><input type="radio" name='status' value='2' @if($res->status ==2 ) checked @endif> <label>已收货</label></li>
                            <li><input type="radio" name='status' value='3' @if($res->status ==3 ) checked @endif> <label>无效订单</label></li>
                            
                        </ul>
                    </div>
                </div>
    
                
            <div class="mws-button-row">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <input type="submit" class="btn btn-danger" value="提交">
                
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