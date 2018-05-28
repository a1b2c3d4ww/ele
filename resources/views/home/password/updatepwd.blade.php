@extends('layout.home')

@section('title','修改密码')

@section('content')
<link href="/home/css/vendor11.css" rel="stylesheet">
<link href="/home/css/login.css" rel="stylesheet">
<div style="width:100%;height:10px"></div>
<div class="ng-scope">
    <div class="profile-container container">
        @include('layout.list')
        <div class="profile-panel">
            <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
                <span ng-bind="pageTitle" class="ng-binding">
                    修改密码
                </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                </span>
            </h3>
             @if (count($errors) > 0)
                    <div class="mws-form-message error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <div style="width:550px;height:120px;text-align:center;line-height:120px;background-color:#666;color:white;font-size:42px;border-radius:60px 60px;position:absolute;z-index:1;">{{ $error }}</div>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('err')) 
                    <div id="code" style="width:550px;height:120px;text-align:center;line-height:120px;background-color:#666;color:white;font-size:42px;border-radius:60px 60px;position:absolute;z-index:1;">{{session('err')}}</div>
                @endif
            <div class="profile-panelcontent" style="width:50%;">
                <form action="/home/doupdate" method="post">
                    {{csrf_field()}}
                    <section class="form-b6px1">
                        <input placeholder="旧密码" name="oldpass" type="password">

                        <div id="show" class="SwitchButton-2b6RO SwitchButton-3BmOw">
                           <div class="SwitchButton-1rBfm"></div>
                           <a>····</a> 
                        </div>
                    </section>
                    <section class="form-b6px1">
                        <input placeholder="新密码" name="password" type="password">
                    </section>
                    <section class="form-b6px1">
                        <input placeholder="确认密码" name="repass" type="password">
                    </section>
                    <button id="tan" class="btn-stress" style="border-radius:4px;margin-top:30px;margin-left:40%;">
                        确认修改
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="/home/js/jquery-3.2.1.min.js"></script>
    <script>   
        $('#code,.mws-form-message').delay(2000).fadeOut(10); 

        var i=1;
        $('.SwitchButton-1rBfm').click(function(){

            i++;

            if(i%2==0){
                $('#show').removeClass('SwitchButton-3BmOw');
                $('#show').addClass('SwitchButton-3wLB9');
                $('#show a').html('abc');
                $('input[name=oldpass]').attr('type','text');
                $('input[name=password]').attr('type','text');
                $('input[name=repass]').attr('type','text');
                
            }else{
                $('#show').removeClass('SwitchButton-3wLB9');
                $('#show').addClass('SwitchButton-3BmOw');
                $('input[name=oldpass]').attr('type','password');
                $('input[name=password]').attr('type','password');
                $('input[name=repass]').attr('type','password');
                $('#show a').html('····');
            }       
        });
    </script>

@show

