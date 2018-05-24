@extends('layout.admin')

@section('title','商家分类修改')


@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span ><i class="icon-list-2"></i> 商家分类修改</span>
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
        <form action="/admin/cate/{{$res->cid}}" method='post' class="mws-form" >
            <div class="mws-form-inline">

                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item">
                        <input type="text" name='cname' class="small" value="{{$res->cname}}">
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <center><input type="submit" class="btn btn-danger" value="修改"></center>
                
            </div>
        </form>
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