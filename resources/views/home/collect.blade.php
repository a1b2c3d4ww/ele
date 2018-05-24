@extends('layout.home')

@section('title','我的收藏')

@section('list')

<div class="profile-panel" role="main">
                    <!-- ngIf: pageTitleVisible -->
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
                    1
                </span>
                家可配送商家
            </h4>
            <div class="clearfix">
                <!-- ngRepeat: restaurant in inRegionFavors -->
                <div class="favor-rstblock" ng-class="{&#39;outofregion&#39;:outofregion}"
                favor-rst-block="" ng-repeat="restaurant in inRegionFavors">
                    <div class="favor-rstblock-header">
                        <div class="favor-rstblock-headerbg" ng-style="{&#39;background-image&#39;: &#39;url(&#39; + backgroundUrl + &#39;)&#39;}"
                        style="background-image: url(&quot;//shadow.elemecdn.com/faas/desktop/media/img/favor-rst-bg1.804470.jpg&quot;);">
                        </div>
                        <a class="favor-rstblock-name ng-binding" ng-bind="restaurant.name" ng-href="/shop/157017122"
                        title="前往三只龙虾" href="https://www.ele.me/shop/157017122">
                            三只龙虾
                        </a>
                        <!-- ngIf: !restaurant.is_opening && !outofregion -->
                        <!-- ngIf: restaurant.status===5 && !outofregion -->
                    </div>
                    <a ng-href="/shop/157017122" title="前往三只龙虾" href="https://www.ele.me/shop/157017122">
                        <img class="favor-rstblock-logo" src="/home/shangjia_images/sanzhilongxia.jpg">
                    </a>
                    <div class="favor-rstblock-starrating icon-star">
                        <span class="icon-star" style="width: 90%;">
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
                                送餐时间
                            </p>
                            <p class="value time ng-binding" ng-bind="restaurant.order_lead_time_text ||  0">
                                38
                            </p>
                        </div>
                    </div>
                    <div class="favor-rstblock-activity">
                        <!-- ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                        <i class="icon ng-binding ng-scope ng-isolate-scope" favor-activity-icon=""
                        name="activity.icon_name" color="activity.icon_color" style="color: rgb(153, 153, 153); border: 1px solid rgb(153, 153, 153); background-color: transparent;">
                            保
                        </i>
                        <!-- end ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                        <i ng-repeat="activity in restaurant.activities | limitTo: 8" ng-bind="activity.icon_name"
                        class="icon ng-binding ng-scope ng-isolate-scope" favor-activity-icon=""
                        name="activity.icon_name" color="activity.icon_color" style="color: rgb(153, 153, 153); border: 1px solid rgb(153, 153, 153); background-color: transparent;">
                            票
                        </i>
                        <!-- end ngRepeat: activity in restaurant.activities | limitTo: 8 -->
                        <i class="favor-rstblock-cancel icon-trash" ng-click="showRemoveMask($index)">
                        </i>
                    </div>
                </div>
                <!-- end ngRepeat: restaurant in inRegionFavors -->
                <!-- ngIf: !inRegionFavors.length -->
            </div>
        </div>
       
    </div>
</div>

@endsection