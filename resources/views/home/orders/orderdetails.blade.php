@extends('layout.home')

@section('title','饿了么-订单详情')

@section('dingdan')
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
            <!-- ngIf: data -->
          
         
            <div orderprogress-rstinfo="" link="orderReady" class="ng-isolate-scope">
                <div class="orderprogress-rstinfo">
                    <a ng-href="/shop/158980905" href="/shop/158980905">
                        <img class="orderprogress-rstimg" ng-src="//fuss10.elemecdn.com/6/ac/0b7d43f3822f8c64c9711fd336a77jpeg.jpeg?imageMogr2/thumbnail/88x88/format/webp/quality/85"
                        width="44" height="44" ng-alt="洞炸鸡(西三旗店)" src="{{$mid->mpic}}">
                    </a>
                    <div class="orderprogress-rstgrid">
                        <h4 class="orderprogress-rstname">
                            <a class="inherit ng-binding" ng-href="/shop/158980905" ng-bind="restaurant.name"
                            href="/shop/158980905">
                          {{$mid->mname}}
                            </a>
                        </h4>
                        <div class="orderprogress-rstextra">
                            <span ng-bind="'订单号：' + order.unique_id" class="ng-binding">
                           {{($res->oid)}}
                            </span>
                            
                        </div>
                    </div>
                    <div class="orderprogress-rstoperate">
                        <!-- ngIf: !favored -->
                        <a href="javascript:" class="rstinfo-favor ng-scope" ng-if="!favored"
                        ng-click="favor('addition')">
                            <i class="icon icon-order-favor">
                            </i>
                            收藏
                        </a>
                        <!-- end ngIf: !favored -->
                        <!-- ngIf: favored -->
                        <!-- ngIf: !complaintStatus -->
                        <a href="javascript:" ng-if="!complaintStatus" dialog-trigger="complaintDialog"
                        class="ng-scope">
                            <i class="icon icon-order-complaint">
                            </i>
                            投诉
                        </a>
                        <!-- end ngIf: !complaintStatus -->
                        <!-- ngIf: complaintStatus===1 -->
                    </div>
                </div>
                <div class="dialog" role="dialog" dialog="complaintDialog" style="display: none;">
                    <div class="dialog-close icon-close">
                    </div>
                    <div class="dialog-content" ng-transclude="">
                        <h5 class="complaint-title ng-scope">
                            投诉举报
                        </h5>
                        <form ng-submit="complaint()" class="ng-scope ng-pristine ng-valid">
                            <!-- ngRepeat: reasonText in complaintType.typeMap -->
                            <label class="complaint-field ng-scope" ng-repeat="reasonText in complaintType.typeMap">
                                <input name="reason" type="radio" ng-model="complaintType.type" ng-value="$index"
                                class="ng-pristine ng-valid" value="0">
                                <span ng-bind="reasonText" class="ng-binding">
                                    商家已确认，但没有送外卖
                                </span>
                            </label>
                            <!-- end ngRepeat: reasonText in complaintType.typeMap -->
                            <label class="complaint-field ng-scope" ng-repeat="reasonText in complaintType.typeMap">
                                <input name="reason" type="radio" ng-model="complaintType.type" ng-value="$index"
                                class="ng-pristine ng-valid" value="1">
                                <span ng-bind="reasonText" class="ng-binding">
                                    商家参加了活动，但没有优惠
                                </span>
                            </label>
                            <!-- end ngRepeat: reasonText in complaintType.typeMap -->
                            <label class="complaint-field ng-scope" ng-repeat="reasonText in complaintType.typeMap">
                                <input name="reason" type="radio" ng-model="complaintType.type" ng-value="$index"
                                class="ng-pristine ng-valid" value="2">
                                <span ng-bind="reasonText" class="ng-binding">
                                    其他
                                </span>
                            </label>
                            <!-- end ngRepeat: reasonText in complaintType.typeMap -->
                            <label class="complaint-field">
                                <textarea ng-model="complaintType.reason_text" rows="2" cols="40" ng-disabled="complaintType.type !== 2"
                                class="ng-pristine ng-valid">
                                </textarea>
                            </label>
                            <div class="complaint-field">
                                <button type="submit" class="btn-primary">
                                    提交
                                </button>
                            </div>
                        </form>
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
                            <!-- ngSwitchWhen: baseline -->
                            <!-- ngSwitchWhen: basketTitle -->
                            <!-- ngSwitchWhen: food -->
                        
                        @foreach($num as $k=>$v)
                            <div ng-switch-when="food" class="orderprogress-totalrow ng-scope">
                            
                                <span class="cell name ng-binding" ng-bind="row.food.name">
                                {{$v->gname}}
                                </span>
                                
                                <span class="cell quantity ng-binding" ng-bind="row.food.quantity">
                                {{$v->num}}
                                </span>
                                
                                <span class="cell price ng-binding" ng-bind="row.food.price * row.food.quantity | number:2">
                            {{$v->price*$v->num}}
                                </span>
                              
                            </div>
                            @endforeach
                             
                            <!-- ngSwitchWhen: extra -->
                        </div>
                        <!-- end ngRepeat: row in totalList -->
                        <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                            <!-- ngSwitchWhen: baseline -->
                            <!-- ngSwitchWhen: basketTitle -->
                            <!-- ngSwitchWhen: food -->
                          
                            <!-- ngSwitchWhen: extra -->
                        </div>
                        <!-- end ngRepeat: row in totalList -->
                        <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                            <!-- ngSwitchWhen: baseline -->
                            <div ng-switch-when="baseline" class="orderprogress-baseline ng-scope">
                            </div>
                            <!-- ngSwitchWhen: basketTitle -->
                            <!-- ngSwitchWhen: food -->
                            <!-- ngSwitchWhen: extra -->
                        </div>
                        <!-- end ngRepeat: row in totalList -->
                        <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                            <!-- ngSwitchWhen: baseline -->
                            <!-- ngSwitchWhen: basketTitle -->
                            <!-- ngSwitchWhen: food -->
                            <!-- ngSwitchWhen: extra -->
                            <div ng-switch-when="extra" class="orderprogress-totalrow ng-scope">
                                <span class="cell name ng-binding" ng-bind="row.extra.name">
                                    配送费
                                </span>
                                <span class="cell quantity">
                                </span>
                                <span class="cell price ng-binding" ng-class="{minus: row.extra.price < 0}"
                                ng-bind="row.extra.price | number:2">
                                   6
                                </span>
                            </div>
                        </div>
                        <!-- end ngRepeat: row in totalList -->
                        <div ng-repeat="row in totalList" ng-switch="" on="row.type" class="ng-scope">
                            <!-- ngSwitchWhen: baseline -->
                            <div ng-switch-when="baseline" class="orderprogress-baseline ng-scope">
                            </div>
                            <!-- ngSwitchWhen: basketTitle -->
                            <!-- ngSwitchWhen: food -->
                            <!-- ngSwitchWhen: extra -->
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
          
                <div class="orderprogress-cardcell rightside ng-isolate-scope" orderprogress-deliveryinfo=""
                link="orderReady">
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
                                <span ng-bind="order.detail_info.deliver_description" class="ng-binding">
                                    尽快送出
                                </span>
                            </p>
                        </div>
                        <div class="orderprogress-deliverygroup">
                            <p>
                                <span class="orderprogress-deliverykey">
                                    联 系 人：
                                </span>
                                <span ng-bind="order.detail_info.consignee" class="ng-binding">
                                   {{$user->name}}
                                </span>
                            </p>
                            <p>
                                <span class="orderprogress-deliverykey">
                                    联系电话：
                                </span>
                                <span ng-bind="order.detail_info.phone" class="ng-binding">
                                   {{$user->tel}}
                                </span>
                            </p>
                            <p>
                                <span class="orderprogress-deliverykey">
                                    收货地址：
                                </span>
                                <span ng-bind="order.detail_info.address" class="ng-binding">
                                   {{$user->addr}}
                                </span>
                            </p>
                        </div>
                        <div class="orderprogress-deliverygroup tail">
                            <p>
                                <span class="orderprogress-deliverykey">
                                    发票信息：
                                </span>
                                <span ng-bind="order.detail_info.invoice || '无发票'" class="ng-binding">
                                    无发票
                                </span>
                            </p>
                            <p>
                                <span class="orderprogress-deliverykey">
                                    备 注：
                                </span>
                                <span ng-bind="order.detail_info.description || '无备注'" class="ng-binding">
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