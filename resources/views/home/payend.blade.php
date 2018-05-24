@extends('layout.home')

@section('title','饿了么-支付成功')

@section('payend')
<div ng-switch="state.type" state="layoutState" class="ng-isolate-scope"></div>
<div class="importantnotification container" role="banner">
    <!-- ngIf: enable -->
</div>
<div class="sidebar ng-hide" role="complementary" ng-hide="layoutState &amp;&amp; layoutState.hideSidebar">
    <div class="sidebar-tabs">
        <div class="toolbar-tabs-middle">
            <a class="toolbar-btn icon-order toolbar-close" href="https://www.ele.me/profile/order"
            hardjump="" tooltip="我的订单" tooltip-placement="left" ubt-click="toolbar_order">
                <!-- ngIf: sidebarCount.uncompletedOrder> 0 -->
            </a>
            <div class="toolbar-separator">
            </div>
            <a class="toolbar-cartbtn icon-cart toolbar-open toolbar-cartbtn-shownum"
            href="JavaScript:" template="cart" ng-class="{&#39;focus&#39;: (activeTemplate === &#39;cart&#39; &amp;&amp; isSidebarOpen), &#39;toolbar-cartbtn-shownum&#39;: foodCount.count}"
            ubt-click="390">
                购物车
                <!-- ngIf: foodCount.count -->
                <i class="toolbar-cartnum ng-binding ng-scope" ng-if="foodCount.count"
                ng-bind="foodCount.count">
                    6
                </i>
                <!-- end ngIf: foodCount.count -->
            </a>
            <div class="toolbar-separator">
            </div>
            <a class="toolbar-btn icon-notice toolbar-open modal-hide" href="JavaScript:">
                <!-- ngIf: messageCount.count -->
            </a>
        </div>
        <div class="toolbar-tabs-bottom">
            <div class="toolbar-btn icon-QR-code">
                <div class="dropbox toolbar-tabs-dropbox">
                    <a href="http://static11.elemecdn.com/eleme/desktop/mobile/index.html"
                    target="_blank">
                        <img src="/home/images/app.png" alt="下载手机应用">
                        <p>
                            下载手机应用
                        </p>
                        <p class="icon-QR-code-bonus">
                            即可参加分享红包活动
                        </p>
                    </a>
                </div>
            </div>
            <a class="toolbar-btn sidebar-btn-backtop icon-top" title="回到顶部" href="JavaScript:" style="visibility: hidden;">
            </a>
        </div>
    </div>
    <div class="sidebar-content"></div>
</div>
<!-- ngView: -->
<div ng-view="" role="main" class="ng-scope">
    <div class="checkoutguide ng-isolate-scope" checkout-guide="" guide="guide">
        <div class="container">
            <a class="checkoutguide-logo icon-logo" href="https://www.ele.me/">
            </a>
            <span class="checkoutguide-text ng-binding" ng-bind="guide.text">
                完成订单
            </span>
            <!-- ngIf: guide.step -->
            <div class="checkoutguide-content step3" ng-if="guide.step">
                <span class="checkoutguide-item active">
                    选择商品
                </span>
                <span class="checkoutguide-item active">
                    确认订单信息
                </span>
                <span class="checkoutguide-item active">
                    成功提交订单
                </span>
                <p class="checkoutguide-line">
                    <span class="line line1">
                    </span>
                    <span class="line line2">
                    </span>
                    <span class="line line3">
                    </span>
                    <span class="line line4">
                    </span>
                </p>
            </div>
            <!-- end ngIf: guide.step -->
        </div>
    </div>
    <!-- ngIf: loading -->
    <div class="ordersuccess pay-header container ng-scope" ng-show="!loading">
        <i class="icon-circle-check pay-header-icon">
        </i>
        <div class="pay-header-info">
            <!-- ngIf: order.is_online_paid -->
            <h2 ng-if="order.is_online_paid" class="ng-scope">
                订单已成功提交并付款，请耐心等待你的外卖
            </h2>
            <!-- end ngIf: order.is_online_paid -->
            <!-- ngIf: !order.is_online_paid -->
            <span class="color-weak">
                送货至：
                <em class="ng-binding">
                    许硕(先生)
                </em>
                <em class="ng-binding">
                    151****7303
                </em>
                <em class="pay-header-address ng-binding">
                    LAMP兄弟连(第一校区店)一号楼
                </em>
            </span>
            <div class="ordersuccess-tip">
                <p>
                    享受完美食后评价订单还能获得金币哦~ 查看
                    <a href="/home/myself">
                        我的金币
                    </a>
                </p>
                <p>
                    预测送餐时间为
                    <em class="color-stress ng-binding" ng-bind="leadTime | date:&#39;HH:mm&#39;">
                        15:32
                    </em>
                    ，请保持手机畅通
                </p>
            </div>
            <div class="ordersuccess-action">
                <a class="btn-primary btn-lg" href="/home/myorder">
                    查看订单
                </a>
                <a class="inherit" hardjump="" href="/">
                    返回首页
                </a>
            </div>
        </div>
        <div class="ordersuccess-aside">
            <img src="/home/images/app.png" alt="下载饿了么APP">
            <p class="color-mute">
                使用手机APP下单，优惠更多
            </p>
        </div>
    </div>
</div>

	


@endsection