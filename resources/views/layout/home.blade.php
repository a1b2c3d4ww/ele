<!DOCTYPE html>
<html class="ng-scope">    
    <head>
        <meta charset="UTF-8">
        <title>@yield('title')</title>
        
        <link rel="icon" href="/home/images/log.png" type="image/png">

        <link href="/home/css/vendor.606e96.css" rel="stylesheet">
        <link href="/home/css/main.153014.css" rel="stylesheet">
        <link href="/home/css/profile.css" rel="stylesheet">


        
       
        <script src="/home/js/perf.js" type="text/javascript" ></script>
        
        <script src="/home/js/vendor.4fb1fa.js" type="text/javascript"></script>
        <script src="/home/js/main.b2394d.js" type="text/javascript"></script>
        <script src="/home/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        
    </head>
    
<body style="position: relative;">

@section('payend')
    @section('dingdan')


    <div ng-switch="state.type" state="layoutState" class="ng-isolate-scope">
        
    </div>

    <div class="importantnotification container" role="banner"></div>

    <div class="sidebar" id="che">
        <div class="sidebar-tabs">
            <div class="toolbar-tabs-middle">
                <a class="toolbar-btn icon-order toolbar-close" href="/home/myorder" id="order">
                </a>
                <div class="toolbar-separator">
                </div>
                <a class="toolbar-cartbtn icon-cart toolbar-open" id="gouwu" href="JavaScript:" >
                    购物车
                    <!-- ngIf: foodCount.count -->
                </a>

                <div class="toolbar-separator"></div>
                <a class="toolbar-btn icon-notice toolbar-open modal-hide" id="info" href="JavaScript:">
                    <!-- ngIf: messageCount.count -->
                </a>

                <div class="tooltip tooltip-placeleft" style="display: none;" id="myorder">
                    <div class="tooltip-arrow"></div>
                    <div class="tooltip-content">我的订单</div>
                </div>

            </div>


            <script> 

                $('#gouwu').click(function(){
                    $(this).addClass('focus');
                    $('#info').removeClass('focus');
                    $('#che').attr('style','transform: translate3d(-295px, 0px, 0px);');
                    $('#cart').attr('style','display:block');
                    $('#message').attr('style','display:none');
                });

                $('#info').click(function(){
                    $(this).addClass('focus');
                    $('#gouwu').removeClass('focus');
                    $('#che').attr('style','transform: translate3d(-295px, 0px, 0px);');
                    $('#message').attr('style','display:block');
                    $('#cart').attr('style','display:none');
                
                });

                $('#message span').click(function(){
                    $(this).removeClass('icon-angle-double-right');
                });

                $('#order').hover(function(){
                    $('#myorder').attr('style','left:-82px;top:8px');
                    $('.tooltip-content').text('我的订单');
                },function(){
                     $('#myorder').attr('style','display:none');
                });

                $('#info').hover(function(){
                    $('#myorder').attr('style','left:-82px;top:159px;');
                    $('.tooltip-content').text('我的信息');
                },function(){
                     $('#myorder').attr('style','display:none');
                });


                $(window).scroll(function(){
                    var aa = $(this).scrollTop();
                    if(aa >= 150){
                        $('#htop').attr('style','visibility:visible');

                        $('#htop').hover(function(){
                            $('#mytop').attr('style','left:-82px;top:50px;');
                            $('.tooltip-content').text('回到顶部');
                        },function(){
                             $('#mytop').attr('style','display:none');
                        });

                        $('#htop').click(function(){

                            $('body,html').animate({scrollTop:0},200);
                        });

                    }else{
                      $('#htop').attr('style','visibility:hidden');
                    }
                });

                function able(){
                    $('#che').removeAttr('style');
                    $('#gouwu').removeClass('focus');
                    $('#info').removeClass('focus');
                }

            </script>

            <div class="toolbar-tabs-bottom">
                <div class="toolbar-btn icon-QR-code">
                    <div class="dropbox toolbar-tabs-dropbox">
                        <a href="http://static11.elemecdn.com/eleme/desktop/mobile/index.html" target="_blank">
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
                <a class="toolbar-btn sidebar-btn-backtop icon-top" href="JavaScript:" style="visibility:hidden;" id="htop">
                    
                </a>

                <div class="tooltip tooltip-placeleft" style="display: none;" id="mytop">
                    <div class="tooltip-arrow"></div>
                    <div class="tooltip-content">回到顶部</div>
                </div>

            </div>
        </div>
    <div class="sidebar-content">
        <div class="ng-scope">
            <div class="ng-scope" id="cart" style="display:none;">
                <div class="sidebarcart-caption">
                    <a class="ng-binding" href="/shop/-1">
                        购物车
                    </a>
                    <span class="icon-angle-double-right" onclick="able()">
                    </span>
                </div>
                <!-- ngIf: loading -->
                <!-- ngIf: pieces -->
                <div class="sidebarcart-summary ng-hide" ng-show="pieces">
                    <p>
                        共
                        <span class="color-stress ng-binding" ng-bind="pieces">
                            0
                        </span>
                        份，总计
                        <span class="color-stress ng-binding" ng-bind="total">
                            0
                        </span>
                    </p>
                    <button ng-click="settle()" class="sidebarcart-submit ng-binding sidebarcart-hasagio">
                        购物车是空的
                    </button>
                </div>
                <!-- ngIf: !loading && !pieces -->
                <div class="sidebarcart-notice ng-scope">
                    <i class="icon-history">
                    </i>
                    <h3>
                        购物车空空如也
                    </h3>
                    <p>
                        快去订餐吧，总有你心仪的美食
                    </p>
                </div>
            </div>

            <div class="ng-scope" id="message" style="display:none;">
                <div class="sidebarmessage-title">
                    我的消息
                    <span class="icon-angle-double-right" onclick="able()">
                    </span>
                </div>
                
                <div class="sidebarmessage-notice">
                    <i class="icon-notice">
                    </i>
                    您没有新的消息哦
                </div>
            </div>

        </div>
    </div>
</div>

    <div state="state" class="ng-scope ng-isolate-scope">
    <header class="topbar" role="navigation">
        
        <div class="container clearfix">
           <h1>
                <a href="#" hardjump="" class="topbar-logo icon-logo">
                    <span>
                        饿了么
                    </span>
                </a>
            </h1>

            <a href="/" hardjump="" class="topbar-item topbar-homepage">
                首页
            </a>
            <a href="/home/myorder" class="topbar-item">
                我的订单
            </a>

            <a href="javascript:" target="_blank" class="topbar-item cooperation">
                加盟合作
            </a>
            <a href="javascript:" target="_blank" class="topbar-item cooperation">

                我的客服
            </a>
            <nav class="topbar-nav">
                <div class="topbar-nav-link">
                    <i class="icon-mobile">
                    </i>
                    手机应用
                    <div class="dropbox topbar-mobile-dropbox">
                        <span>
                            扫一扫, 手机订餐更方便
                        </span>
                        <img src="/home/images/app.png" class="topbar-nav-qrcode"
                        alt="扫一扫下载饿了么手机 App">
                    </div>
                </div>
                <div topbar-profilebox="">
                    <div class="topbar-profilebox">
                        <img src="{{Session::get('homeUser.upic')}}" class="topbar-profilebox-avatar ng-scope ng-hide">
                        <span class="topbar-profilebox-avatar icon-profile">
                        </span>
                        <span ng-show="!$root.user.username" class="">
                            <a href="/home/login">
                                登录
                            </a>
                            |
                            <a href="/home/reg">
                                注册
                            </a>
                        </span>
                        <span class="topbar-profilebox-wrapper ng-hide" ng-show="$root.user.username">
                            <!-- ngIf: $root.topbarType===' checkout' -->
                            <span class="topbar-profilebox-username ng-binding">
                                {{Session::get('homeUser.uname')}}
                            </span>
                            <!-- ngIf: $root.topbarType===' checkout' -->
                            <!-- ngIf: $root.topbarType !==' checkout' -->
                            <span class="topbar-profilebox-btn icon-arrow-down ng-scope">
                            </span>
                            <!-- end ngIf: $root.topbarType !==' checkout' -->
                            <div class="dropbox topbar-profilebox-dropbox">
                                <a class="icon-profile" href="/home/myself/">
                                    个人中心
                                </a>
                                <a class="icon-star" href="/home/enshrine">
                                    我的收藏
                                </a>
                                
                                <a class="icon-logout" href="/home/logout">
                                    退出登录
                                </a>
                            </div>
                        </span>
                    </div>
                </div>
            </nav>
        </div>
    </header>
</div>
       
@section('content')


 <div ng-view="" role="main" class="ng-scope">
    <div class="profile-container container" id="three">
        <div class="clearfix">
            <div class="location" style="height:20px;">
               
            </div>
            <div search-input="">
            </div>
        </div>
        <ul class="profile-sidebar" role="navigation" profile-sidebar="">
            <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle">
                    <i class="icon-line-home">
                    </i>
                    <a href="/home/myself">
                        个人中心
                    </a>
                </h2>
            </li>
              <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle">
                    <a href="/home/myorder">
                        <i class="icon-order-favor">
                        </i>
                        我的订单
                    </a>
                </h2>
            </li>
          
             <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle">
                    <a href="/home/myinfo">
                        <i class="icon-order-favor">
                        </i>
                        我的资料
                    </a>
                </h2>
            </li>
          
            <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle">
                    <a href="/home/enshrine">
                        <i class="icon-order-favor">
                        </i>
                        我的收藏
                    </a>
                </h2>
            </li>
            <li class="profile-sidebar-section">
                <h2 class="profile-sidebar-sectiontitle">
                    <a href="/home/mycarts">
                        <i class="icon-cart">
                        </i>
                        购物车
                    </a>
                </h2>
            </li>
        </ul>
        @section('list')

        @show
    </div>  

   

@show


    @show

@show


    <footer class="footer" role="contentinfo">
        <div class="container clearfix">
            <div class="footer-link">
                <h3 class="footer-link-title">
                  
                </h3>
                <a class="footer-link-item" href="https://help.ele.me/pc/" target="_blank">
                 
                </a>
            </div>
            <div class="footer-link">
                <h3 class="footer-link-title">
                 
                </h3>
                <a class="footer-link-item" href="https://kaidian.ele.me/" target="_blank">
                
                </a>
                <a class="footer-link-item" href="https://www.ele.me/support/about/jiameng"
                target="_blank">
                   
                </a>
                <a class="footer-link-item" href="https://www.ele.me/support/about/contact"
                target="_blank">
                  
                </a>
                <a class="footer-link-item" href="http://openapi.eleme.io/" target="_blank">
                
                </a>
            </div>
            <div class="footer-link">
                <h3 class="footer-link-title">
                    友情链接
                </h3>
           
                <a class="footer-link-item" href="" target="_blank">
                    <img src="">
                </a>
           
            </div>
            <div class="footer-contect">
                <div class="footer-contect-item">
                    24小时客服热线 :
                    <a class="inherit" href="tel:10105757">
                        10105757
                    </a>
                </div>
                <div class="footer-contect-item">
                    关注我们 :
                    <div href="JavaScript:" class="icon-wechat" ubt-click="402">
                        <div class="dropbox dropbox-bottom footer-contect-dropbox" ubt-visit="402">
                            <img src="/home/images/weixin.png"
                            alt="微信号: elemeorder">
                            <p>
                                微信号: elemeorder
                            </p>
                            <p>
                                饿了么网上订餐
                            </p>
                        </div>
                    </div>
                    <a href="http://e.weibo.com/elemeorder" class="icon-weibo" target="_blank">
                    </a>
                </div>
            </div>
            <div class="footer-mobile">
                <a href="https://h.ele.me/landing" target="_blank">
                    <img src="/home/images/app.png" class="footer-mobile-icon"
                    alt="扫一扫下载饿了么手机 App">
                </a>
                <div class="footer-mobile-content">
                    <h3>
                        下载手机版
                    </h3>
                    <p>
                        扫一扫,手机订餐方便
                    </p>
                </div>
            </div>
            <div class="footer-copyright serif">
                <h5 class="owner">
                    所有方：上海拉扎斯信息科技有限公司
                </h5>
                <p>
                    增值电信业务许可证 :
                    <a href="http://www.shca.gov.cn/" target="_blank">
                        沪B2-20150033
                    </a>
                    |
                    <a href="http://www.miibeian.gov.cn/" target="_blank">
                        沪ICP备 09007032
                    </a>
                    |
                    <a href="#"
                    target="_blank">
                        上海工商行政管理
                    </a>
                    Copyright ©2008-2018 ele.me, All Rights Reserved.互联网药品信息服务资格证书 编号：（沪）-经营性-2016-0011
                </p>
            </div>
            <div class="footer-police container">
                <a href="#" rel="nofollow" target="_blank">
                    <img alt="已通过沪公网备案，备案号 310100103568" src="/home/images/gongshang.jpg"
                    height="30">
                </a>
            </div>
        </div>
    </footer>
    <script>
            var name = '<?= Session::get('homeUser.uname')?>';
            if(name){
               $('span').eq(8).removeClass('ng-hide');
               $('span').eq(8).siblings().eq(1).addClass('ng-hide');
               $('span').eq(8).siblings().eq(2).addClass('ng-hide');


               var upic = '<?= Session::get('homeUser.upic')?>';
                if(upic){
                    $('span').eq(8).siblings().eq(0).removeClass('ng-hide');
                }
            }
        </script> 


    @section('js')
    

    @show
</body>

</html>