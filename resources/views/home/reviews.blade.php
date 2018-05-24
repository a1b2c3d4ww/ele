@extends('layout.home')

@section('title','评价')

@section('content') 
    <script>
        $('header').addClass('shoptopbar');
        $('#che').addClass('ng-hide');
        $('body').attr('class','hidesidebar');
    </script>
        
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
                    <a class="toolbar-cartbtn icon-cart toolbar-open" href="JavaScript:" template="cart"
                    ng-class="{&#39;focus&#39;: (activeTemplate === &#39;cart&#39; &amp;&amp; isSidebarOpen), &#39;toolbar-cartbtn-shownum&#39;: foodCount.count}"
                    ubt-click="390">
                        购物车
                        <!-- ngIf: foodCount.count -->
                    </a>
                    <div class="toolbar-separator">
                    </div>
                    <a class="toolbar-btn icon-notice toolbar-open modal-hide" href="JavaScript:"
                    template="message" ng-class="{&#39;focus&#39;: (activeTemplate === &#39;message&#39; &amp;&amp; isSidebarOpen), &#39;toolbar-open&#39;: user, &#39;modal-hide&#39;: user}"
                    tooltip="我的信息" tooltip-placement="left" ubt-click="392">
                        <!-- ngIf: messageCount.count -->
                    </a>
                </div>
                <div class="toolbar-tabs-bottom">
                    <div class="toolbar-btn icon-QR-code">
                        <div class="dropbox toolbar-tabs-dropbox">
                            <a href="http://static11.elemecdn.com/eleme/desktop/mobile/index.html"
                            target="_blank">
                                <img src="./沿海405烤场外卖_沿海405烤场菜单_电话_沿海405烤场网上订餐 - 北京市朝阳区百子湾东里405号楼1至2层108_files/appqc.95e532.png"
                                alt="下载手机应用">
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
            <div class="shopguide ng-isolate-scope" shop-guide="" data="shop" isdisabled="shop.disabled">
                <div class="container" ng-show="shop" itemscope="" itemtype="http://schema.org/Restaurant">
                    <div class="shopguide-info">
                        <meta itemprop="url" content="https://www.ele.me/shop/1315079">
                        <img ng-src="//fuss10.elemecdn.com/9/58/642bb5ea828b2fe054bc425ce2050png.png?imageMogr2/thumbnail/95x95/format/webp/quality/85"
                        alt="沿海405烤场" itemprop="image" src="/home/shangjia_images/kfc.jpeg">
                        <div class="shopguide-info-wrapper">
                            <div>
                                <h1 title="沿海405烤场" ng-class="{hastip: shop.tip}" itemprop="name" class="ng-binding">
                                    沿海405烤场
                                </h1>
                                <!-- ngIf: shop.tip -->
                                <a ng-href="/shop/1315079/info" href="https://www.ele.me/shop/1315079/info">
                                    <!-- ngIf: isJingHua -->
                                </a>
                            </div>
                            <p class="shopguide-info-rate">
                                <div class="starrating icon-star ng-isolate-scope" title="评分5.0分" rate-star=""
                                rating="shop.rating">
                                    <span class="icon-star" ng-style="{ width: (rating * 20) + &#39;%&#39; }"
                                    style="width: 100%;">
                                    </span>
                                </div>
                                (
                                <a ng-href="/shop/1315079/rate" class="ng-binding" href="https://www.ele.me/shop/1315079/rate">
                                    742
                                </a>
                                )
                            </p>
                            <p>
                                <!-- ngRepeat: flavor in shop.flavor -->
                            </p>
                        </div>
                        <div class="shopguide-info-extra">
                            <ul>
                                <!-- ngIf: shopRatingScore -->
                                <li class="shopguide-extra-item shopguide-extra-compete ng-scope" ng-if="shopRatingScore">
                                    <div itemscope="" itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">
                                        <h2 class="color-stress ng-binding" itemprop="ratingValue">
                                            5.0
                                        </h2>
                                        <meta itemprop="bestRating" content="5">
                                        <meta itemprop="reviewCount" content="742">
                                        <p>
                                            综合评价
                                            <br>
                                            <span class="color-mute ng-binding">
                                                高于周边商家
                                            </span>
                                            <!-- ngIf: shopRatingScore.compare_rating -->
                                            <span class="color-stress ng-binding ng-scope" ng-if="shopRatingScore.compare_rating">
                                                73.1%
                                            </span>
                                            <!-- end ngIf: shopRatingScore.compare_rating -->
                                        </p>
                                    </div>
                                    <div>
                                        <p>
                                            服务态度
                                            <div class="starrating icon-star ng-isolate-scope" title="评分5.0分" rate-star=""
                                            rating="shopRatingScore.service_score">
                                                <span class="icon-star" ng-style="{ width: (rating * 20) + &#39;%&#39; }"
                                                style="width: 100%;">
                                                </span>
                                            </div>
                                            <span class="color-stress ng-binding">
                                                5.0分
                                            </span>
                                        </p>
                                        <p>
                                            菜品评价
                                            <div class="starrating icon-star ng-isolate-scope" title="评分4.5分" rate-star=""
                                            rating="shopRatingScore.food_score">
                                                <span class="icon-star" ng-style="{ width: (rating * 20) + &#39;%&#39; }"
                                                style="width: 90.8466%;">
                                                </span>
                                            </div>
                                            <span class="color-stress ng-binding">
                                                4.5分
                                            </span>
                                        </p>
                                    </div>
                                </li>
                                <!-- end ngIf: shopRatingScore -->
                                <!-- ngIf: shop.description -->
                                <li class="shopguide-extra-item ng-binding ng-scope" ng-if="shop.description"
                                itemprop="description">
                                    尊敬的食客您好：本店所有的烤品使用的签子均为不锈钢签子，成本高于普通竹签和铁签，所以会产生部分打包费用，如果把签子撸掉放入餐盒会影响菜品口味，请您谅解。
                                    打包后烤品因外送时间原因，口感不如在店内食用，建议您在时间充足的情况下到店品尝，现烤现吃，味道就是不一样，期待您的光临！
                                </li>
                                <!-- end ngIf: shop.description -->
                                <li class="shopguide-extra-item address">
                                    <p itemscope="" itemprop="streetAddress" itemtype="http://schema.org/PostalAddress">
                                        <span class="label">
                                            商家地址：
                                        </span>
                                        <span class="ng-binding">
                                            北京市朝阳区百子湾东里405号楼1至2层108
                                        </span>
                                        <meta itemprop="telephone" content="18311185868">
                                    </p>
                                    <p>
                                        <span class="label">
                                            营业时间：
                                        </span>
                                        <span itemprop="openingHours" class="ng-binding">
                                            17:00-02:00
                                        </span>
                                    </p>
                                </li>
                                <li class="shopguide-extra-item">
                                    <p class="shopguide-extra-delivery">
                                        由
                                        <span class="ng-binding">
                                            沿海405烤场
                                        </span>
                                        提供配送服务
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="shopguide-server">
                        <span ng-hide="shop.id == 656683" class="">
                            <em>
                                起送价
                            </em>
                            <em class="shopguide-server-value ng-binding">
                                20元
                            </em>
                        </span>
                        <span ng-hide="shop.id == 656683" class="">
                            <em>
                                配送费
                            </em>
                            <em class="shopguide-server-value ng-binding">
                                夜间配送费¥7.5
                            </em>
                            <!-- ngIf: shop.delivery_mode.description -->
                        </span>
                        <span ng-hide="shop.id == 656683" class="">
                            <em>
                                平均送达速度
                            </em>
                            <em class="shopguide-server-value ng-binding">
                                28分钟
                            </em>
                        </span>
                    </div>
                    <a class="shopguide-favor" href="javascript:" ng-click="favor()">
                        <!-- ngIf: isFavorShop -->
                        <!-- ngIf: !isFavorShop -->
                        <i ng-if="!isFavorShop" class="icon-favorite ng-scope">
                        </i>
                        <!-- end ngIf: !isFavorShop -->
                        <!-- ngIf: isFavorShop -->
                        <!-- ngIf: !isFavorShop -->
                        <span ng-if="!isFavorShop" class="ng-scope">
                            收藏
                        </span>
                        <!-- end ngIf: !isFavorShop -->
                    </a>
                </div>
            </div>
            <div shop-nav="" data="shop" filter-data="shop.filter" display-type="shop.displayType"
            shop-action="shopAction" class="ng-scope ng-isolate-scope">
                <div class="shopnav">
                    <div class="container clearfix">
                        <div class="shopnav-left">
                            
                            <a class="shopnav-tab active" href=""
                            ng-class="{active: shop.tab === &#39;rate&#39;}">
                                评价
                            </a>
                            
                            <!-- ngIf: shopAction===' menu' -->
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="shopmain clearfix container ng-scope">
                <!-- ngIf: shopAction===' menu' -->
                <!-- ngIf: shopAction===' rate' -->
                <div ng-if="shopAction === &#39;rate&#39;" shop-rate="" class="shoprate ng-scope"
                perf-click="desktop/202">
                    <div class="commentbox">
                        <div class="commentfilter">
                            <!-- ngRepeat: item in ratingTypeList -->
                            <a class="commentfilter-item ng-binding ng-scope active" ng-repeat="item in ratingTypeList"
                            ng-class="{active: filter.type === item.record_type}" ng-click="select(item.record_type)">
                                全部(271)
                            </a>
                           
                            <!-- end ngRepeat: item in ratingTypeList -->
                        </div>
                        <ul id="ratinglist" class="commentlist">
                            <!-- ngRepeat: comment in ratingStorage[filter.type].data -->
                            @foreach($res as $k=>$v)
 <li class="commentitem" comment-item="" ng-repeat="comment in ratingStorage[filter.type].data">
                                <span class="commentitem-avatar">
                                    <img ng-src="//shadow.elemecdn.com/faas/desktop/media/img/default-avatar.38e40d.png"
                                    alt="l****d" src="{{getuName($v->uid)->upic}}">
                                </span>
                                <div class="commentitem-content">
                                    <h4 class="commentitem-username ng-binding">
                                        {{getuName($v->uid)->uname}}
                                    </h4>
                                  
                                    <!-- ngRepeat: food in comment.item_rating_list -->
                                    <!-- ngIf: comment.item_rating_list -->
                                    <div class="shoprate-itemrating shoprate-itemratinglist ng-isolate-scope"
                                    item-rating-list="" data="food" ng-if="comment.item_rating_list" ng-repeat="food in comment.item_rating_list">
                                        <span class="shoprate-itemratinglist-name ng-binding">
                                            干豆腐卷
                                        </span>
                                        <div class="commentitem-stars rate ng-isolate-scope" config="rateConfig"
                                        value="ratingValue" isreadonly="true" rate="">
                                            <p class="rate-star readonly level4" ng-class="{readonly: isreadonly, star: starStyle}">
                                                <!-- ngIf: label -->
                                                <span ng-click="doRate($event)" ng-mouseover="doRate($event)" ng-mouseleave="doRate($event)"
                                                data-level="4">
                                                 @if($v->level== 1)
                                                    <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                    @elseif($v->level==2)
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                    @elseif($v->level==3)
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                    @elseif($v->level==4)
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                      @elseif($v->level==5)
                                                       <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                     <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                      <a class="icon-star-good active" href="javascript:" data-level="1" ng-class="{active : rateLevel &gt;= 1}">
                                                    </a>
                                                    @endif
                                                   

                                                
                                                   
                                                </span>
                                                <!-- ngIf: config.tipText -->
                                                <span ng-if="config.tipText" class="active rate-star-text ng-binding ng-scope"
                                                ng-bind="config.tipText[rateLevel]">
                                                @if($v->level==1)
                                                极差
                                                @elseif($v->level==2)
                                                较差
                                                @elseif($v->level==3)
                                                合格
                                                @elseif($v->level==4)
                                                较好
                                                @elseif($v->level==5)
                                                满意
                                                @endif
                                                </span>
                                                <!-- end ngIf: config.tipText -->
                                            </p>
                                            <!-- ngIf: config.mutiContent -->
                                            <!-- ngIf: !config.mutiContent -->
                                            <div ng-if="!config.mutiContent" class="rate-content simple ng-scope ng-hide"
                                            ng-show="!config.mutiContent &amp;&amp; value.value &gt; 0" ng-hide="copyVal.value || value.value === 0">
                                                <textarea ng-attr-placeholder=""
                                                ng-model="value.text" class="ng-pristine ng-valid" placeholder="">
                                                </textarea>
                                            </div>
                                            <!-- end ngIf: !config.mutiContent -->
                                            <!-- ngIf: copyVal.text -->
                                        </div>
                                        <a href="javascript:" ng-click="linkToFood(data.food_id)">
                                            {{$v->content}}
                                        </a>
                                        <!-- ngIf: data.rating_text -->
                                        <!-- ngIf: data.reply_text -->
                                    </div>
                                 
                                    <!-- end ngIf: comment.item_rating_list -->
                                    <!-- end ngRepeat: food in comment.item_rating_list -->
                                    <span class="commentitem-date ng-binding">
                                      <!--   2018-05-18 12:00:00 -->
                                    </span>
                                    <!-- ngIf: comment.reply_text -->
                                    <!-- ngRepeat: item in foodImgUrl -->
                                </div>
                            </li>
                            @endforeach
                            <!-- end ngRepeat: comment in ratingStorage[filter.type].data -->
                          

                            <!-- end ngRepeat: comment in ratingStorage[filter.type].data -->
                        </ul>
                        <div class="loading ng-binding ng-isolate-scope ng-hide" loading="" ng-show="loading">
                            <!-- ngIf: type==='profile' -->
                            <img ng-if="type===&#39;profile&#39;" src="./沿海405烤场外卖_沿海405烤场菜单_电话_沿海405烤场网上订餐 - 北京市朝阳区百子湾东里405号楼1至2层108_files/profile-loading.4984fa.gif"
                            alt="正在加载" class="ng-scope">
                            <!-- end ngIf: type==='profile' -->
                            <!-- ngIf: type==='normal' -->
                            正在载入数据...
                        </div>
                        <!-- ngIf: !loading && !ratingStorage[filter.type].data.length -->
                    </div>
                </div>
                <!-- end ngIf: shopAction===' rate' -->
                <!-- ngIf: shopAction===' info' -->
                <div class="shopmain-right ng-isolate-scope" shop-bulletin="" data="shop">
                    <div class="shopbulletin">
                        <div class="shopbulletin-section">
                            <h3 class="shopbulletin-section-title">
                                商家公告
                            </h3>
                            <p class="shopbulletin-content ng-binding">
                                尊敬的食客您好：本店所有的烤品使用的签子均为不锈钢签子，成本高于普通竹签和铁签，所以会产生部分打包费用，如果把签子撸掉放入餐盒会影响菜品口味，请您谅解。
                                打包后烤品因外送时间原因，口感不如在店内食用，建议您在时间充足的情况下到店品尝，现烤现吃，味道就是不一样，期待您的光临！
                            </p>
                            <div class="shopbulletin-delivery">
                                <h4>
                                    配送说明：
                                </h4>
                                <p class="ng-binding">
                                    配送费¥7.5
                                </p>
                            </div>
                            <ul class="shopbulletin-supports">
                                <!-- ngRepeat: support in shop.supports -->
                                <li ng-repeat="support in shop.supports" class="ng-binding ng-scope">
                                    <span ng-style="{&#39;background-color&#39;: &#39;#&#39; + support.icon_color}"
                                    class="ng-binding" style="background-color: rgb(153, 153, 153);">
                                        保
                                    </span>
                                    该商户食品安全已由中国太平洋保险承保，食品安全有保障
                                </li>
                                <!-- end ngRepeat: support in shop.supports -->
                                <li ng-repeat="support in shop.supports" class="ng-binding ng-scope">
                                    <span ng-style="{&#39;background-color&#39;: &#39;#&#39; + support.icon_color}"
                                    class="ng-binding" style="background-color: rgb(153, 153, 153);">
                                        票
                                    </span>
                                    该商家支持开发票，开票订单金额300元起，请在下单时填写好发票抬头
                                </li>
                                <!-- end ngRepeat: support in shop.supports -->
                            </ul>
                            <a href="javascript:" class="shopcomplaint" ng-click="testLogin()">
                                举报商家
                            </a>
                        </div>
                        <div class="dialog" role="dialog" dialog="complaintDialog" style="display: none;">
                            <div class="dialog-close icon-close">
                            </div>
                            <div class="dialog-content" ng-transclude="">
                                <h5 class="complaint-title ng-scope">
                                    举报商家
                                </h5>
                                <form ng-submit="complaint()" class="ng-scope ng-pristine ng-valid">
                                    <label class="complaint-field">
                                        <textarea class="shopcomplaint-textarea ng-pristine ng-valid" ng-model="complaintObj.text"
                                        rows="6" cols="40">
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
                </div>
            </div>
            <div class="sidetools" side-tools="">
                <a href="http://kaidian.ele.me/" class="sidetools-item icon-visit-history"
                target="_blank" title="我要开店" tooltip="我要开店" tooltip-placement="left">
                </a>
                <div class="sidetools-item icon-qrcode">
                    <img class="sidetools-qrcode" src="./沿海405烤场外卖_沿海405烤场菜单_电话_沿海405烤场网上订餐 - 北京市朝阳区百子湾东里405号楼1至2层108_files/appqc.95e532.png"
                    alt="扫描二维码免费下载手机App">
                </div>
                <a href="JavaScript:" class="sidetools-item icon-arrow-up" title="回到顶部"
                tooltip="回到顶部" tooltip-placement="left" ng-click="backToTop()">
                </a>
            </div>
        </div>
        
    </body>

</html>
@endsection