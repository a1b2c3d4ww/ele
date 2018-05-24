@extends('layout.admin')

@section('title','管理员修改')


@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span ><i class="icon-list-2"></i> 管理员修改</span>
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
        <form action="/admin/user/{{$res->aid}}" method='post' class="mws-form" >
            <div class="mws-form-inline">

                <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item">
                        <input type="text" name='aname' class="small" value="{{$res->aname}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">密码</label>
                    <div class="mws-form-item">
                        <input type="text" name='password' class="small" value="">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">确认密码</label>
                    <div class="mws-form-item">
                        <input type="text" name='repass' class="small" value="">
                    </div>
                </div>
               

                <div class="mws-form-row">
                    <label class="mws-form-label">手机号</label>
                    <div class="mws-form-item">
                        <input type="text" name='tel' class="small" value="{{$res->tel}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">权限</label>
                    <div class="mws-form-item">
                                        <select class="required small " name="auth">
                                            <option  value="1"  @if($res->auth=='1') selected @endif >超级管理员</option>
                                            <option value="2" @if($res->auth=='2') selected @endif>普通管理员</option>
                                        </select>
                                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <input type="submit" class="btn btn-danger" value="修改">
                
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