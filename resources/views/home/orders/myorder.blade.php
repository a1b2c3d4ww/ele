@extends('layout.home')

@section('title','我的订单')

@section('list')

        <div class="profile-panel" role="main">
            <!-- ngIf: pageTitleVisible -->
            <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
                <span ng-bind="pageTitle" class="ng-binding">
                    近三个月订单
                </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                </span>
            </h3>
            <!-- end ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <div class="order-fetchtakeout ng-scope ng-isolate-scope" show-fetch-takeout-dialog="">
                    <img src="/home/images/takeout.408a87.png">
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
                                           已下单
                                        @elseif($v->status == 0)
                                            无效订单
                                        @elseif($v->status == 3)
                                        <a href="/home/homedown/{{$res->uid}}">确认收货(配送中)</a>
                                         @elseif($v->status == 4)
                                            交易完成 
                                        
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
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                  <a class="ordertimeline - handle - detail " ng-href="order / id / 1219646428822216768 "
                href="/home/homeorder/{{$res->uid}}"}">
                    取消订单
                </a>

            </td>

    
        </tr>

        @endforeach
        <!-- end ngRepeat: item in orderList -->
    </tbody>
</table>
@endsection

