@extends('layout.admin')

@section('title',$title)


@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
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

        <form action="/admin/member" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">真实姓名</label>
                    <div class="mws-form-item">
                        <input type="text" name='name' class="small">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">年龄</label>
                    <div class="mws-form-item">
                        <input type="text" name='age' class="small">
                    </div>
                </div>

    
                <div class="mws-form-row">
                    <label class="mws-form-label">账号</label>
                    <div class="mws-form-item">
                        <input type="text" name='uname' class="small">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">密码</label>
                    <div class="mws-form-item">
                        <input type="password" name='password' class="small">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">确认密码</label>
                    <div class="mws-form-item">
                        <input type="password" name='repass' class="small">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">电话</label>
                    <div class="mws-form-item">
                        <input type="text" name='tel' class="small">
                    </div>
                </div>
                  <div class="mws-form-row">
                    <label class="mws-form-label">地址</label>
                    <div class="mws-form-item">
                        <input type="text" name='addr' class="small">
                    </div>
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">头像</label>
                    <div class="mws-form-item">
                        <input type="file" name='upic' readonly="readonly" style="width: 100%; padding-right: 85px;" class="fileinput-preview" placeholder="No file selected...">
                    </div>
                </div>


                <div class="mws-form-row">
                    <label class="mws-form-label">性别</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list inline">
                            <li><input type="radio" name='sex' value='1' > <label>女</label></li>
                            <li><input type="radio" name='sex' value='0' checked> <label>男</label></li>
                            
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

@endsection

@section('js')
<script>
    $('.mws-form-message').delay(3000).slideUp(1000);

</script>

@endsection