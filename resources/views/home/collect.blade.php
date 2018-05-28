@extends('layout.home')

@section('title','我的收藏')



@section('content')

<div style="width:100%;height:10px"></div>
    <div class="ng-scope">
    <div class="profile-container container">
        @include('layout.list')
<div class="profile-panel" role="main">


    <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
        <span ng-bind="pageTitle" class="ng-binding">
            我的收藏
        </span>
        <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
        </span>
    </h3>
    <!-- end ngIf: pageTitleVisible -->
    <div class="profile-panelcontent" ng-transclude="">
        <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" content="正在载入商家信息..."
        ng-show="favorLoading">
            <!-- ngIf: type==='profile' -->
            <img ng-if="type===&#39;profile&#39;" src="./收藏_files/profile-loading.4984fa.gif"
            alt="正在加载" class="ng-scope">
            <!-- end ngIf: type==='profile' -->
            <!-- ngIf: type==='normal' -->
            正在载入商家信息...
        </div>
        <div class="favor-restaurants ng-scope" ng-show="!favorLoading">
            <h4 class="favor-title">
                当前区域共有
                <span ng-bind="inRegionFavors.length || 0" class="ng-binding">


                    {{$count}}


                </span>
                家可配送商家
            </h4>
            <div class="clearfix">
                <!-- ngRepeat: restaurant in inRegionFavors -->


                @foreach($mid as $k=>$v)


                <div class="favor-rstblock" ng-class="{&#39;outofregion&#39;:outofregion}"
                favor-rst-block="" ng-repeat="restaurant in inRegionFavors">
                    <div class="favor-rstblock-header">
                        <div class="favor-rstblock-headerbg" ng-style="{&#39;background-image&#39;: &#39;url(&#39; + backgroundUrl + &#39;)&#39;}"
                        style="background-image: url(&quot;//shadow.elemecdn.com/faas/desktop/media/img/favor-rst-bg1.804470.jpg&quot;);">
                        </div>
                        <a class="favor-rstblock-name ng-binding" ng-bind="restaurant.name" ng-href="/shop/157017122"


                        title="{{getmid($v)->mname}}" href="/home/merchant/index/{{$v}}">
                            {{getmid($v)->mname}}


                        </a>
                        <!-- ngIf: !restaurant.is_opening && !outofregion -->
                        <!-- ngIf: restaurant.status===5 && !outofregion -->
                    </div>


                    <a ng-href="/shop/157017122" title="{{getmid($v)->mname}}" href="/home/merchant/index/{{$v}}">
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
                         @if(getmid($v)->level==4)
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
                            <p class="value time ng-binding" ng-bind="restaurant.order_lead_time_text ||  0">
                                30
                            </p>
                        </div>
                    </div>
                    <div class="favor-rstblock-activity rstblock-activity">
                        <!-- ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                         @if(getmid($v)->status=='1')
                        <i style="background:#E75959;">新</i>
                         @endif
                        @if(getmid($v)->safe=='1')


                        <i class="icon ng-binding ng-scope ng-isolate-scope" favor-activity-icon=""
                        name="activity.icon_name" color="activity.icon_color" style="color: rgb(153, 153, 153); border: 1px solid rgb(153, 153, 153); background-color: transparent;">
                            保
                        </i>


                        @endif
                        @if(getmid($v)->bill=='1')


                        <!-- end ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                        <i ng-repeat="activity in restaurant.activities | limitTo: 8" ng-bind="activity.icon_name"
                        class="icon ng-binding ng-scope ng-isolate-scope" favor-activity-icon=""
                        name="activity.icon_name" color="activity.icon_color" style="color: rgb(153, 153, 153); border: 1px solid rgb(153, 153, 153); background-color: transparent;">
                            票
                        </i>


                        @endif
                        <!-- end ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                        <a class="favor-rstblock-cancel icon-trash" href="/home/enshrine/del/{{$v}}" ng-click="showRemoveMask($index)" onclick="return confirm('你确定要删除吗?')">
                        </a>
                       <!--  <button class="btn btn-small" onclick="return confirm('你确定要删除吗?')"><i class="icon-trash"></i></button> -->
                    </div>
                </div>
                @endforeach


                <!-- end ngRepeat: restaurant in inRegionFavors -->
                <!-- ngIf: !inRegionFavors.length -->
            </div>
        </div>
       
    </div>
</div>

@endsection