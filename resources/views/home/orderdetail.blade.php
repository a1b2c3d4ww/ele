@extends('layout.home')

@section('title','饿了么-订单详情')


@section('content')
<div style="width:100%;height:10px"></div>
    <div class="ng-scope">
    <div class="profile-container container">
        @include('layout.list')
<div class="profile-panel" role="main">
    <!-- ngIf: pageTitleVisible -->
    <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
        <span ng-bind="pageTitle" class="ng-binding">
            订单详情
        </span>
        <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
        </span>
    </h3>
    <!-- end ngIf: pageTitleVisible -->
    <div class="profile-panelcontent" ng-transclude="">
        <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" ng-hide="progressDisplay">
            <!-- ngIf: type==='profile' -->
            <img ng-if="type==='profile'" src="//shadow.elemecdn.com/faas/desktop/media/img/profile-loading.4984fa.gif"
            alt="正在加载" class="ng-scope">
            <!-- end ngIf: type==='profile' -->
            <!-- ngIf: type==='normal' -->
            正在载入数据...
        </div>
        <div ng-show="progressDisplay" class="ng-scope">
            <div orderprogress-refundinfo="" link="orderReady" class="ng-isolate-scope">
                <!-- ngIf: refundingShow -->
            </div>

            <div link="orderReady" class="ng-isolate-scope">
                <div class="orderprogress-rstinfo">
                    <a href="javascript:">
                        <img class="orderprogress-rstimg" width="44" height="44" src="{{$mid->mpic}}">
                    </a>
                    <div class="orderprogress-rstgrid">
                        <h4 class="orderprogress-rstname">
                            <a class="inherit ng-binding" href="javascript:">
                          {{$mid->mname}}
                            </a>
                        </h4>
                        <div class="orderprogress-rstextra">
                            <span class="ng-binding">
                           订单号：{{($res->oid)}}
                            </span>
                            
                        </div>
                    </div>
                    <div class="orderprogress-rstoperate">

                        <a href="javascript:" class="ng-scope">
                            <i class="icon icon-order-complaint">
                            </i>
                            投诉
                        </a>

                    </div>
                </div>
            </div>
           
            <div class="orderprogress-cardtable">
                <div class="orderprogress-cardcell ng-isolate-scope" orderprogress-total=""
                link="orderReady">
                    <div class="orderprogress-total">
                        <div class="orderprogress-totalrow orderprogress-totaltitle">
                            <span class="cell name">
                                菜品
                            </span>
                          
                            <span class="cell quantity">
                                数量
                            </span>
                       
                            <span class="cell price">
                                小计（元）
                            </span>
                        </div>
                  
                        <!-- ngRepeat: row in totalList -->
                        <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                        
                        @foreach($num as $k=>$v)
                            <div class="orderprogress-totalrow ng-scope">
                            
                                <span class="cell name ng-binding">
                                {{$v->gname}}
                                </span>
                                
                                <span class="cell quantity ng-binding">
                                {{$v->num}}
                                </span>
                                
                                <span class="cell price ng-binding">
                            {{$v->price*$v->num}}
                                </span>
                              
                            </div>
                            @endforeach
                             
                            <!-- ngSwitchWhen: extra -->
                        </div>
                        <!-- end ngRepeat: row in totalList -->
                        <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                          
                        </div>

                        <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                            <!-- ngSwitchWhen: baseline -->
                            <div ng-switch-when="baseline" class="orderprogress-baseline ng-scope">
                            </div>

                        </div>
                        <!-- end ngRepeat: row in totalList -->
                        <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                            
                            <div ng-switch-when="extra" class="orderprogress-totalrow ng-scope">
                                <span class="cell name ng-binding" ng-bind="row.extra.name">
                                    配送费
                                </span>
                                <span class="cell quantity">
                                </span>
                                <span class="cell price ng-binding">
                                   6
                                </span>
                            </div>
                        </div>
                        <!-- end ngRepeat: row in totalList -->
                        <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                            <!-- ngSwitchWhen: baseline -->
                            <div ng-switch-when="baseline" class="orderprogress-baseline ng-scope">
                            </div>
                        </div>
                        <!-- end ngRepeat: row in totalList -->
                        <div class="orderprogress-totalactual">
                            实际支付：
                       
                            <span ng-bind="order.total_amount | number:2" class="ng-binding">
                            {{$sum}}
                            </span>
                           
                        </div>
                    </div>
                </div>
          
                <div class="orderprogress-cardcell rightside ng-isolate-scope">
                    <div class="orderprogress-deliveryinfo">
                        <h5 class="orderprogress-deliverytitle">
                            配送信息
                        </h5>
                        <div class="orderprogress-deliverygroup">
                            <p>
                                <span class="orderprogress-deliverykey">
                                    配送方式：
                                </span>
                                <span class="ng-binding">
                                    {{$mid->mname}}提供配送服务
                                </span>
                            </p>
                            <p>
                                <span class="orderprogress-deliverykey">
                                    送达时间：
                                </span>
                                <span class="ng-binding">
                                    尽快送出
                                </span>
                            </p>
                        </div>
                        <div class="orderprogress-deliverygroup">
                            <p>
                                <span class="orderprogress-deliverykey">
                                    联 系 人：
                                </span>
                                <span class="ng-binding">
                                   {{$user->name}}
                                </span>
                            </p>
                            <p>
                                <span class="orderprogress-deliverykey">
                                    联系电话：
                                </span>
                                <span class="ng-binding">
                                   {{$user->tel}}
                                </span>
                            </p>
                            <p>
                                <span class="orderprogress-deliverykey">
                                    收货地址：
                                </span>
                                <span class="ng-binding">
                                   {{$user->addr}}
                                </span>
                            </p>
                        </div>
                        <div class="orderprogress-deliverygroup tail">
                            <p>
                                <span class="orderprogress-deliverykey">
                                    发票信息：
                                </span>
                                <span class="ng-binding">
                                    无发票
                                </span>
                            </p>
                            <p>
                                <span class="orderprogress-deliverykey">
                                    备 注：
                                </span>
                                <span class="ng-binding">
                                    无备注
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="orderprogress-roundborder">
            </div>
        </div>
    </div>
</div>

@endsection