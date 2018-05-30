@extends('layout.home')

@section('title','个人中心')



@section('content')
    <div style="width:100%;height:10px"></div>
<div class="ng-scope">
    <div class="profile-container container">
        @include('layout.list')




        <div class="profile-panel" role="main">
            <!-- ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <div class="profile-info ng-scope">
                    <div class="profile-infoitem">
                        <div class="profile-avatarwrap">
                            <img src="{{$res->upic}}" width="100%">
                            <a href="/home/myinfo" class="profile-edit">
                                编辑资料
                            </a>
                        </div>
                        <div class="profile-perosondata">
                            <h3 class="profile-name ng-binding">
                                早上好，
                                <strong class="ng-binding">
                                    {{$res->uname}}
                                </strong>
                            </h3>
                            <p class="profile-tips ng-binding" ng-bind="timeSection.tipText">
                                订餐了吗？提前订餐送的快！
                            </p>
                        </div>
                        
                    </div>
                </div>

   




         
                <div class="profile-footprint ng-scope">
                    <div class="tabnavigation">
                        <a class="tabnavigation-navitem active">
                            美食足迹
                        </a>


                        <a class="tabnavigation-navitem" href="/home/enshrine">


                            我的收藏
                        </a>
                        <div class="tabnavigation-rightitem ng-scope ng-binding simplepagination"
                        simplepagination="" pagination-context="restaurantContext" ng-show="restaurantContext.data.length">
                            1/1
                            <span class="pre-btn icon-profile-left-arrow disable" ng-class="{&#39;disable&#39;:currentPage===1}">
                            </span>
                            <span class="next-btn icon-profile-right-arrow disable" ng-class="{&#39;disable&#39;:currentPage===pageCount}">
                            </span>
                        </div>
                    </div>


                    @if(Session::get('mid'))
                    @foreach(Session::get('mid') as $k=>$v)
                    <div class="footprint-content clearfix">

                        <!-- ngRepeat: restaurant in restaurantContext.pageData -->
                        <a class="noline rstblock ng-isolate-scope" href="/home/merchant/index/{{$v}}">
                            <div class="rstblock-logo">
                                <img width="70" height="70" class="rstblock-logo-icon" src="{{getmid($v)->mpic}}">
                                <!-- ngIf: restaurant.order_lead_time_text -->
                                
                                <!-- end ngIf: restaurant.order_lead_time_text -->
                                <!-- ngIf: restaurant.is_premium -->
                            </div>

                            <div class="rstblock-content">
                                <div class="rstblock-title ng-binding" ng-bind="restaurant.name">
                                    {{getmid($v)->mname}}


                                </div>
                                <div class="starrating icon-star">
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
                                <div class="rstblock-cost ng-binding">


                                    配送费¥6
                                </div>

                                <div class="rstblock-activity ng-scope">
                                    @if(getmid($v)->status=='1')
                                    <i style="background:#E75959;">新</i>
                                    @endif
                                    @if(getmid($v)->safe=='1')
                                    <i class="ng-binding ng-scope" style="background: rgb(255, 255, 255); color: rgb(153, 153, 153); border: 1px solid; padding: 0px;">
                                        保
                                    </i>
                                    @endif
                                    @if(getmid($v)->bill=='1')
                                     <i class="ng-binding ng-scope" style="background: rgb(255, 255, 255); color: rgb(153, 153, 153); border: 1px solid; padding: 0px;">
                                        票
                                    </i>
                                    @endif



                                </div>

                            </div>
                        </a>

                    </div>


                    @endforeach
                    @endif



                </div>
              
            </div>
        </div>
    </div>
</div>
@endsection