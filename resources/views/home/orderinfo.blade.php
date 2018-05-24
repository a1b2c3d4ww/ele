@extends('layout.home')

@section('title','饿了么-订单详情')

@section('orderdetail')

<div ng-switch="state.type" state="layoutState" class="ng-isolate-scope">
        <!-- ngSwitchWhen: checkout -->
            <header class="carttopbar" ng-switch-when="checkout" topbar-checkout=""
            state="state">
                
            </header>
        </div>
        <div class="importantnotification container" role="banner">
            
        </div>
        <div class="sidebar ng-hide">
            <div class="sidebar-tabs">
                <div class="toolbar-tabs-middle">
                    <a class="toolbar-btn icon-order toolbar-close" href="#"
                    hardjump="" tooltip="我的订单" tooltip-placement="left" ubt-click="toolbar_order">
                        <!-- ngIf: sidebarCount.uncompletedOrder> 0 -->
                    </a>
                    <div class="toolbar-separator">
                    </div>
                    <a class="toolbar-cartbtn icon-cart toolbar-open toolbar-cartbtn-shownum"
                    href="JavaScript:">
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
                    <a class="toolbar-btn icon-notice toolbar-open modal-hide" href="JavaScript:"
                tooltip="我的信息">
                        <!-- ngIf: messageCount.count -->
                    </a>
                </div>
                <div class="toolbar-tabs-bottom">
                    <div class="toolbar-btn icon-QR-code">
                        <div class="dropbox toolbar-tabs-dropbox">
                            <a href="#"
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
                    <a class="toolbar-btn sidebar-btn-backtop icon-top" tooltip="回到顶部" title="回到顶部"
                    href="JavaScript:" tooltip-placement="left" style="visibility: hidden;">
                    </a>
                </div>
            </div>
            <div class="sidebar-content">
                <!-- ngInclude: activeTemplate ? ('/common/page/_block/sidebar/sidebar-'+
                activeTemplate + '/sidebar-'+ activeTemplate + '.html') : '' -->
            </div>
        </div>
        <!-- ngView: -->
        <div ng-view="" role="main" class="ng-scope">
            <div class="checkoutguide ng-isolate-scope" checkout-guide="" guide="guide">
                <div class="container">
                    <a class="checkoutguide-logo icon-logo" href="https://www.ele.me/">
                    </a>
                    <span class="checkoutguide-text ng-binding" ng-bind="guide.text">
                        订单信息
                    </span>
                    <!-- ngIf: guide.step -->
                    <div class="checkoutguide-content step2" ng-if="guide.step">
                        <span class="checkoutguide-item active" ng-class="{active: guide.step &gt;= 1}">
                            选择商品
                        </span>
                        <span class="checkoutguide-item active" ng-class="{active: guide.step &gt;= 2}">
                            确认订单信息
                        </span>
                        <span class="checkoutguide-item" ng-class="{active: guide.step &gt;= 3}">
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
            <div class="container clearfix ng-scope">
                <!-- ngIf: loading -->
                <!-- ngIf: !loading && nofood -->
                <!-- ngIf: !loading && !nofood -->
                <div ng-if="!loading &amp;&amp; !nofood" class="checkout-cart ng-scope ng-isolate-scope"
                checkout-cart="cart">
                    <div class="checkoutcart-container">
                        <div class="checkoutcart-title">
                            <h2>
                                订单详情
                            </h2>
                            
                        </div>
                        <div class="checkoutcart-tablerow tablehead">
                            <div class="cell itemname">
                                商品
                            </div>
                            <div class="cell itemquantity">
                                份数
                            </div>
                            <div class="cell itemtotal">
                                小计（元）
                            </div>
                        </div>
                        <!-- ngRepeat: basket in cart.vm.group -->
                        <!-- ngIf: basket.length -->
                        <dl ng-if="basket.length" ng-repeat="basket in cart.vm.group" class="checkoutcart-group ng-scope">
                         
                            <!-- ngRepeat: item in basket -->
                            <dd ng-repeat="item in basket" class="ng-scope">
                                @foreach($arr as $k=>$v)
                                <div class="checkoutcart-tablerow">
                                    <div class="cell itemname ng-binding" ng-bind="item.name" title="皮蛋瘦肉粥">
                                        {{$v['gname']}}
                                    </div>
                                    <div class="cell itemquantity">
                                      
                                        <input ng-model="item.quantity" ng-change="cart.update(item)" ng-blur="cart.blur(item)"
                                        class="ng-pristine ng-valid">{{$v['num']}}
                                    
                                    </div>
                                    <div class="cell itemtotal " >
                                       ￥{{$v['price']}}
                                    </div>
                                </div>
                                @endforeach
                            </dd>
                        </dl>

                        <ul ng-if="cart.vm.extra || cart.vm.records" class="ng-scope">
                            <!-- ngRepeat: item in cart.vm.extra -->
                            <li ng-repeat="item in cart.vm.extra" class="checkoutcart-tablerow extra ng-scope">
                                <div class="cell itemname">
                                    <span ng-bind="item.name" title="配送费" class="ng-binding">
                                        配送费
                                    </span>
                                    <!-- ngIf: item.name===' 配送费' -->
                                    <span ng-if="item.name === &#39;配送费&#39;" class="icon-circle-help ng-scope"
                                    tooltip="" tooltip-placement="left">
                                    </span>
                                    <!-- end ngIf: item.name===' 配送费' -->
                                </div>
                                <div class="cell itemquantity">
                                </div>
                                <div class="cell itemtotal ng-binding" ng-class="{minus: item.price &lt; 0}"
                                ng-bind="&#39;¥&#39; + (item.price | number:2)">
                                    ¥6.00
                                </div>
                            </li>
                            <!-- end ngRepeat: item in cart.vm.extra -->
                            <li ng-repeat="item in cart.vm.extra" class="checkoutcart-tablerow extra ng-scope">
                                <div class="cell itemname">
                                    <span ng-bind="item.name" title="" class="ng-binding">
                                    </span>
                                    <!-- ngIf: item.name===' 配送费' -->
                                </div>
                                <div class="cell itemquantity">
                                </div>
                              
                            </li>
                            <!-- end ngRepeat: item in cart.vm.extra -->
                            <li ng-repeat="item in cart.vm.extra" class="checkoutcart-tablerow extra ng-scope">
                                <div class="cell itemname">
                                    <span ng-bind="item.name" title="餐盒" class="ng-binding">
                                        餐盒
                                    </span>
                                    <!-- ngIf: item.name===' 配送费' -->
                                </div>
                                <div class="cell itemquantity">
                                </div>
                                <div class="cell itemtotal ng-binding" ng-class="{minus: item.price &lt; 0}"
                                ng-bind="&#39;¥&#39; + (item.price | number:2)">
                                    ¥4.00
                                </div>
                            </li>
                        </ul>
                        <!-- end ngIf: cart.vm.extra || cart.vm.records -->
                        <div class="checkoutcart-total color-stress">
                            ¥
                            <span class="num ng-binding" ng-bind="cart.vm.total | number: 2">
                                {{$sum}}
                            </span>
                        </div>
                        <div class="checkoutcart-totalextra">
                            共
                            <span ng-bind="cart.pieces" class="ng-binding">
                                {{$cnt}}
                            </span>
                            份商品
                            <!-- ngIf: cart.vm.benefit -->
                        </div>
                    </div>
                </div>
				
				<script>
					function tan(){
				        $('#haha').attr('style','display:block;z-index:1003;left:245px;top:100px;');
				        $('#dvs').attr('style','display:block;z-index:1002;position:fixed;left:0px;top:0px;width:100%;height:100%;opacity:0.5;background:rgb(0, 0, 0);');
					}
				    
				    function down(){
				        $('#haha').attr('style','display:none;');
				        $('#dvs').attr('style','display:none;');
				    }

				</script>
				<div id="dvs" style="display:none;" onclick="down()"></div>
                <form action="/home/orderest/pay" method="post">
                <div class="checkout-content ng-scope">
                    <div class="checkout-select ng-isolate-scope">
                        <h2>
                            收货地址
                            <!-- <a class="checkout-addaddress" href="javascript:" >
                                添加新地址
                            </a> -->
                        </h2>
                        <!-- ngIf: !addressList.length -->
                        <ul class="checkout-address-list showfirst">
                            <!-- ngRepeat: item in addressList -->
                            <li class="checkout-address ng-scope active">
                                <i class="checkout-address-icon icon-location-line">
                                </i>
                                <div class="checkout-address-info">
                                    <p class="ng-binding">
                                        {{$user['uname']}}
                                    </p>
                                    <p class="color-weak ng-binding" ng-bind="item.address + item.address_detail">
                                        {{$user['addr']}}
                                    </p>
                                </div>
                                <div class="checkout-address-edit">
                                    <a href="javascript:" onclick="tan()">
                                        修改
                                    </a>
                                </div>
                            </li>
                            <!-- end ngRepeat: item in addressList -->
                            <a class="checout-showmoreaddress ng-hide" href="javascript:">
                                显示更多地址
                                <i class="icon-arrow-down">
                                </i>
                            </a>
                            <a class="checout-showmoreaddress ng-hide" href="javascript:">
                                收起
                                <i class="icon-arrow-up">
                                </i>
                            </a>
                        </ul>
                    </div>
                    <div class="checkout-select">
                        <h2 class="checkout-title">
                            付款方式
                            <span class="color-tip checkout-pay-tip">
                                推荐使用在线支付，不用找零，优惠更多
                            </span>
                        </h2>
                        <ul class="clearfix">
                            <!-- ngRepeat: pay in payList -->
                            <li class="checkout-pay ng-scope active">
                                <p ng-bind="pay.title" class="ng-binding">
                                    在线支付
                                </p>
                                <p class="color-mute ng-binding" ng-bind="pay.tip">
                                    支持微信、支付宝、QQ钱包及大部分银行卡
                                </p>
                            </li>
                            <!-- end ngRepeat: pay in payList -->
                        </ul>
                    </div>
                    <div class="checkout-select">
                        <h2 class="checkout-title">
                            选择优惠
                        </h2>
                       
                        <p class="checkout-info">
                            <span class="checkout-infolabel">
                                使用优惠券
                            </span>
                            <span class="color-mute">
                                网站不支持
                                <em class="color-stress">
                                    （仅手机客户端可用）
                                </em>
                            </span>
                        </p>
                    </div>
                    <div class="checkout-select">
                        <h2 class="checkout-title">
                            其他信息
                        </h2>
                        <div class="checkout-info">
                            <span class="checkout-infolabel">
                                配送方式
                            </span>
                            <span>
                                本订单由
                                <a ng-bind="&#39; [&#39; + delivery + &#39;] &#39;" class="ng-binding">
                                    [商家]
                                </a>
                                提供配送
                            </span>
                        </div>
                      
                        <div class="checkout-info">
                            <span class="checkout-infolabel">
                                发票信息
                            </span>
                            <span class="checkout-invoice" ng-mouseenter="toggleInvoice($event)" ng-mouseleave="toggleInvoice($event)">
                                <input class="checkout-input ng-pristine ng-valid" placeholder="仅在饿了么 APP 中支持开发票哦" disabled="disabled">
                                <ul class="checkout-invoice-list ng-hide" ng-show="showInvoice">
                                    <!-- ngRepeat: item in invoices -->
                                </ul>
                            </span>
                        </div>
                        {{ csrf_field() }}
                        <div class="checkout-info">
                            <span class="checkout-infolabel">
                                客户嘱咐
                            </span>
                            
                            <span>
                                <input name="details" class="checkout-input ng-pristine ng-valid">
                            </span>
                            
                        </div>
                    </div>
                    <div>
                        <button class="btn-stress btn-lg ng-binding ng-isolate-scope">确认下单</button>
                          </form>
                        <div class="checkout-dapp">
                            <p class="checkout-dapp-tip">
                                扫码下载APP
                                <br>
                                APP下单立享优惠
                            </p>
                            <i class="icon-qrcode checkout-dapp-qrcode">
                            </i>
                            <i class="icon-uniE029 checkout-dapp-arrow">
                            </i>
                            <img src="/home/images/app.png" alt="扫一扫下载饿了么手机 App">
                        </div>
                    </div>
                </div>
                <!-- end ngIf: !loading && !nofood -->
            </div>
        </div>
       <div class="addressdialog" id="haha"  style="display:none;">
		    <div class="addressdialog-close" id="off" onclick="down()">
		    </div>
		    <div class="addressdialog-header">
		        添加新地址
		    </div>
		    <div class="addressdialog-content">
		        <!-- <form action="" > -->
		        
		        <div class="addressform">
		            <div>
		                <div class="addressformfield">
		                    <label id="xing">
		                        姓名
		                    </label>
		                    <input placeholder="请输入您的姓名" name="uname">
		                    <div class="addressformfield-hint">
		                        <span>
		                        </span>
		                    </div>
		                </div>
		                <div class="addressformfield sexfield">
		                    <label>
		                        性别
		                    </label>
		                    <div>
		                        <input id="sexfield-1-male" name="sex" type="radio" value="1">
		                        <label for="sexfield-1-male">
		                            先生
		                        </label>
		                        <input id="sexfield-1-female" type="radio" name="sex" value="2">
		                        <label for="sexfield-1-female">
		                            女士
		                        </label>
		                    </div>
		                    <div class="addressformfield-hint">
		                        <span>
		                        </span>
		                    </div>
		                </div>
		                <div class="addressformfield">
		                    <label>
		                        位置
		                    </label>
		                    <input placeholder="请输入小区、大厦或学校" name="addr">
		                    <div class="address-suggestlist">
		                        <ul>
		                        </ul>
		                    </div>
		                    <div class="addressformfield-hint">
		                        <span>
		                        </span>
		                    </div>
		                </div>
		                <div class="addressformfield">
		                    <label>
		                        详细地址
		                    </label>
		                    <input placeholder="单元、门牌号" name="detail">
		                    <div class="addressformfield-hint">
		                        <span>
		                        </span>
		                    </div>
		                </div>
		                <div class="addressformfield phonefield">
		                    <label>
		                        手机号
		                    </label>
		                    <input placeholder="请输入您的手机号" name="phone">
		                    <div class="addressformfield-hint">
		                        <span>
		                        </span>
		                    </div>
		                </div>
		            </div>
		            <div class="addressform-buttons">
		                <button  onclick="up();down()">
		                    保存
		                </button>
		                <button type="button" onclick="down()">
		                    取消
		                </button>
		            </div>
		        </div>
		        <!-- </form> -->
		    </div>
		</div>
@endsection