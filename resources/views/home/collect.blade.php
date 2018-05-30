@extends('layout.home')

@section('title','我的收藏')

@section('content')

<div style="width:100%;height:10px"></div>
    <div class="ng-scope">
    <div class="profile-container container">
        @include('layout.list')
<div class="profile-panel" role="main">


    <h3 class="profile-paneltitle ng-scope">
        <span class="ng-binding">
            我的收藏
        </span>
        <span class="subtitle ng-binding">
        </span>
    </h3>

    <div class="profile-panelcontent">

        <div class="favor-restaurants ng-scope">
            <h4 class="favor-title">
                当前区域共有
                <span class="ng-binding">

                    {{$count}}

                </span>
                家可配送商家
            </h4>
            <div class="clearfix">

                @foreach($mid as $k=>$v)

                <div class="favor-rstblock">
                    <div class="favor-rstblock-header">
                        <div class="favor-rstblock-headerbg" style="background-image: url(/home/images/collect.jpg);">
                        </div>
                        <a class="favor-rstblock-name ng-binding" title="{{getmid($v)->mname}}" href="/home/merchant/index/{{$v}}">
                            {{getmid($v)->mname}}

                        </a>

                    </div>


                    <a title="{{getmid($v)->mname}}" href="/home/merchant/index/{{$v}}">
                        <img class="favor-rstblock-logo" src="{{getmid($v)->mpic}}">


                    </a>
                    <div class="favor-rstblock-starrating icon-star">
                         @if(getmid($v)->level==0)
                            <span class="icon-star" style="width:0%;;">
                        @endif
                         @if(getmid($v)->level==1)
                            <span class="icon-star" style="width:20%;;">
                        @endif
                          @if(getmid($v)->level==2)
                            <span class="icon-star" style="width:40%;;">
                        @endif
                          @if(getmid($v)->level==3)
                            <span class="icon-star" style="width:60%;;">
                        @endif
                          @if(getmid($v)->level==4)
                            <span class="icon-star" style="width:80%;;">
                        @endif
                         @if(getmid($v)->level==5)
                            <span class="icon-star" style="width:100%;;">
                        @endif
                        </span>
                    </div>
                    <div class="favor-rstblock-content">
                        <div class="favor-rstblock-item">
                            <p>
                                起送价
                            </p>
                            <p class="value icon-yen ng-binding">
                                0
                            </p>
                        </div>
                        <div class="favor-rstblock-item">
                            <p>
                                配送时间
                            </p>
                            <p class="value time ng-binding">
                                30
                            </p>
                        </div>
                    </div>
                    <div class="favor-rstblock-activity rstblock-activity">

                         @if(getmid($v)->status=='1')
                        <i style="background:#E75959;">新</i>
                         @endif

                        @if(getmid($v)->safe=='1')
                        <i class="icon ng-binding ng-scope ng-isolate-scope" style="color: rgb(153, 153, 153); border: 1px solid rgb(153, 153, 153); background-color: transparent;">
                            保
                        </i>
                        @endif

                        @if(getmid($v)->bill=='1')
                        <i class="icon ng-binding ng-scope ng-isolate-scope" style="color: rgb(153, 153, 153); border: 1px solid rgb(153, 153, 153); background-color: transparent;">
                            票
                        </i>
                        @endif

                        <a class="favor-rstblock-cancel icon-trash" href="/home/enshrine/del/{{$v}}" onclick="return confirm('你确定要删除吗?')">
                        </a>

                    </div>
                </div>
                @endforeach

            </div>
        </div>
       
    </div>
</div>

@endsection