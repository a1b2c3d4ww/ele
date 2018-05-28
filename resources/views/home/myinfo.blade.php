@extends('layout.home')

@section('title','个人资料')



@section('content')

<div style="width:100%;height:10px"></div>
    <div class="ng-scope">
    <div class="profile-container container">
        @include('layout.list')
<div class="profile-panel" role="main">



    <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
        <span ng-bind="pageTitle" class="ng-binding">
            个人资料
        </span>
        <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
        </span>
    </h3>
    <!-- end ngIf: pageTitleVisible -->
    <div class="profile-panelcontent" ng-transclude="">
        <div class="profileinfo ng-scope" style="width:50%;">
            <p class="profileinfo-item">
                <span class="profileinfo-label">
                    头像：
                </span>
                <span class="profileinfo-face">
                    <img src="{{$res->upic}}" style ="border-radius:50%">
                </span>
            </p>
            <p class="profileinfo-item">
                <span class="profileinfo-label">
                    用户名：
                </span>
                <span>
                    <span class="profileinfo-value ng-binding">
                       {{$res->uname}}
                    </span>
                </span>
            </p>
             <p class="profileinfo-item">
                <span class="profileinfo-label">
                    年龄：
                </span>
                <span>
                    <span class="profileinfo-value ng-binding">
                      {{$res->age}}
                    </span>
                </span>
            </p>
             <p class="profileinfo-item">
                <span class="profileinfo-label">
                    性别：
                </span>
                <span>
                    <span class="profileinfo-value ng-binding">
                         @if($res->sex == 1)
                          女
                        @else
                           男
                        @endif
                    </span>
                </span>
            </p>
             <p class="profileinfo-item">
                <span class="profileinfo-label">
                   电话：
                </span>
                <span>
                    <span class="profileinfo-value ng-binding">
                       {{$res->tel}}
                    </span>
                </span>
            </p>
             <p class="profileinfo-item">
                <span class="profileinfo-label">
                   地址：
                </span>
                <span>
                    <span class="profileinfo-value ng-binding">
                       {{$res->addr}}
                    </span>
                </span>

                </p>
            <button id="tan" type="button" class="btn-stress" style="border-radius:4px;margin-top:20px;margin-left:15%;">修改</button>

            <!-- ngIf: user.email -->
        </div>
    </div>
</div>

<div id="dvs" style="display:none;" onclick="down()"></div>
    <script>
        $('#tan').click(function(){
        $('#haha').attr('style','display:block;z-index:1003;left:245px;top:80px;');
        $('#dvs').attr('style','display:block;z-index:1002;position:fixed;left:0px;top:0px;width:100%;height:100%;opacity:0.5;background:rgb(0, 0, 0);');
    });

        function down(){
        $('#haha').attr('style','display:none;');
        $('#dvs').attr('style','display:none;');
    }
    </script>

    <div class="addressdialog" id="haha"  style="display:none;">
    <div class="addressdialog-close" id="off" onclick="down()">
    </div>
    <div class="addressdialog-header">
        添加新地址
    </div>
    <div class="addressdialog-content">

        <form action="/home/dmyinfo/{{$res->uid}}" method ="get" enctype='multipart/form-data'>  
        <div class="addressform">
            <div>
                <div class="addressformfield">
                    <label id="xing">
                        姓名
                    </label>
                    <input placeholder="请输入您的姓名" name="uname" value="{{$res->uname}}">
                    <div class="addressformfield-hint">
                        <span>
                        </span>
                    </div>
                </div>

                <div class="addressformfield sexfield">
                    <label>
                        性别
                    </label>
                    <div>
                        
                        <input id="sexfield-1-male" name="sex" type="radio" value="1"  @if($res->sex == 1) checked @endif>
                        <label for="sexfield-1-male">
                            女
                        </label>

                        <input id="sexfield-1-female" type="radio" name="sex" value="2"  @if($res->sex == 0) checked @endif>
                        <label for="sexfield-1-female">
                            男
                        </label>
                    </div>
                    <div class="addressformfield-hint">
                        <span>
                        </span>
                    </div>

                </div>
                <div class="addressformfield phonefield">
                    <label>
                        年龄
                    </label>
                    <input placeholder="请输入您的年龄" name="age" value="{{$res->age}}">
                    <div class="addressformfield-hint">
                        <span>
                        </span>
                    </div>
                </div>
                <div class="addressformfield">
                    <label>
                        详细地址
                    </label>
                    <input placeholder="单元、门牌号" name="addr" value="{{$res->addr}}">
                    <div class="addressformfield-hint">
                        <span>
                        </span>
                    </div>
                </div>
                <div class="addressformfield phonefield">
                    <label>
                        手机号
                    </label>
                    <input placeholder="请输入您的手机号" name="tel" value="{{$res->tel}}">
                    <div class="addressformfield-hint">
                        <span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="addressform-buttons">

                <button  onclick="up();down()">

                    保存
                </button>
                <button onclick="down()" type="button">
                    取消
                </button>
            </div>
        </div>

        </form>

    </div>
</div>


@endsection