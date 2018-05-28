@extends('layout.home')

@section('title','我的订单')

@section('content')
<div style="width:100%;height:10px"></div>
<div class="ng-scope">
    <div class="profile-container container">
        @include('layout.list')
        <div class="profile-panel">
            <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
                <span ng-bind="pageTitle" class="ng-binding">
                    我的订单
                </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                </span>
            </h3>
            <div class="profile-panelcontent" ng-transclude="">
                <div class="order-fetchtakeout ng-scope ng-isolate-scope" show-fetch-takeout-dialog="">
                    <img src="/home/images/takeout.408a87.png">
                </div>
                <table class="order-list ng-scope" ng - show="orderList.length">
                    <thead>
                        <tr>
                            <th>
                                下单时间
                            </th>
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
                            <td class="ordertimeline-time">
                                <p class="ng-binding">
                                    {{date('Y-m-d H:i',$v->otime)}}
                                </p>
                                <i class="ordertimeline-time-icon icon-uniE65E finish ng-scope">
                                </i>
                                <!-- end ngIf: item.realStatus===5 -->
                            </td>
                            <td class="ordertimeline-avatar">
                                <a ng - href="/shop/" href="/shop/">
                                    <img src="{{getmid($v->mid)->mpic}}">
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
                                <h3 class="ordertimeline - title ordertimeline - price ui - arial ng - binding ">
                                    {{$v->sum}}
                                </h3>
                            </td>
                            <td class="ordertimeline - status ">
                                <h3 class="ng - binding end ">
                                    @if($v->status == 1) 新订单 @elseif($v->status == 2) 已发货 @elseif($v->status
                                    == 3) 已收货 @else($v->status == 4) 无效订单 @endif
                                </h3>
                                <!-- ngIf: statusText -->
                            </td>
                            <td class="ordertimeline - handle ">
                                <a class="ordertimeline - handle - detail " href="/home/orderdetails/{{$v->oid}}/{{$v->mid}}">
                                    订单详情
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

