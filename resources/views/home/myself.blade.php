@extends('layout.home')

@section('title','个人中心')

@section('list')
        
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
                    <div class="profile-infoitem">
                       
                    </div>
                    <div class="profile-infoitem">
                       
                    </div>
                    <div class="profile-infoitem">
                        
                    </div>
                </div>
   


<table class="order-list ng-scope" ng - show="orderList.length">
    <thead>
        <tr>
            <th class="order-list-infoth">
                订单内容
            </th>
            <th>
            </th>
            <th>
                支付金额（元）
            </th>
            <th>
                状态
            </th>
            <th>
                操作
            </th>
        </tr>
    </thead>

    <tbody>
        <tr>
        </tr>
    
        @foreach($order as $k=>$v)
        <!-- ngRepeat: item in orderList -->
<tr class="timeline" order-timeline="" ng-repeat="item in orderList">
            <td class="ordertimeline-avatar">
                <a ng - href="/shop/" href="/shop/">
                    <img ng - src="{{getmid($v->mid)->mpic}}"
                    src="//fuss10.elemecdn.com/6/ac/0b7d43f3822f8c64c9711fd336a77jpeg.jpeg?imageMogr2/thumbnail/140x140/format/webp/quality/85">
                </a>
            </td>
            <td class="ordertimeline-info">
                <h3 class="ordertimeline-title">
                    <a ng - href="/shop/" ng - bind="item.restaurant.name" class="ng-binding"
                    href="/shop/">
                    </a>
                    <!-- ngIf: item.is_book -->
                </h3>
                <p class="ordertimeline-info-food">
                    <a ng - href="order/id/1219646428822216768" href="order/id/1219646428822216768">
                        @foreach(getdetails($v->oid) as $kk=>$vv)
                        <span class="ordertimeline-food ng-binding" ng - bind="item.product">
                         {{$vv->gname}}
                        </span>
                        @endforeach
                   
                        <span class="ordertimeline-info-productnum ng-binding" ng-bind="item.productnum">
                         {{$kk+1}}
                        </span>
                        <span>
                            个菜品
                        </span>
                       
                    </a>
                </p>
                <p>
                    订单号:
                    <a ng-href="order/id / 1219646428822216768 " ng-bind="item.unique_id "
                    class="ng - binding " href="order / id / 1219646428822216768 ">
                       {{$v->oid}}
                    </a>
                </p>
            </td>
            <td class="ordertimeline - amount ">
                <h3 class="ordertimeline - title ordertimeline - price ui - arial ng - binding "
                ng-bind="item.total_amount.toFixed(2)">
                    {{$v->sum}}
                </h3>
            </td>
            <td class="ordertimeline - status ">
                <h3 ng-bind="item.statusText " ng-class=" {
                'waitpay': (item.realStatus === 1),
                'end': (item.realStatus === 5)
                }
                " class="ng - binding end ">
                                        @if($v->status == 1)
                                          新订单
                                        @elseif($v->status == 2)
                                           已发货
                                        @elseif($v->status == 3)
                                        已收货
                                        @else($v->status == 4)
                                        无效订单
                                        @endif
                </h3>
                <!-- ngIf: statusText -->
            </td>
            <td class="ordertimeline - handle ">
                <a class="ordertimeline - handle - detail " ng-href="order / id / 1219646428822216768 "
                href="orderdetails/{{$v->oid}}/{{$v->mid}}">
                    订单详情
                </a>
                <!-- ngIf: item.realStatus===1 -->
                <!-- ngIf: item.realStatus===2 -->
                <!-- ngIf: item.realStatus===3 -->
                <!-- ngIf: item.realStatus===4 -->
                <!-- ngIf: item.realStatus===5 -->
                <!-- end ngIf: item.realStatus===5 -->
                <!-- ngIf: item.realStatus===6 -->
            </td>
        </tr>
        @endforeach
        <!-- end ngRepeat: item in orderList -->
    </tbody>
</table>

         
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
                                    <span class="icon-star" style="width: 98%;">
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

	

@endsection