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

    <div class="ng-isolate-scope">  
    </div>

    <div class="importantnotification container" role="banner"></div>

    <div class="sidebar" id="che">
        <div class="sidebar-tabs">
            <div class="toolbar-tabs-middle">
                <a class="toolbar-btn icon-order toolbar-close" href="/home/myorder" id="order">
                </a>
                <div class="toolbar-separator">
                </div>
                <a class="toolbar-cartbtn icon-cart toolbar-open" id="gouwu" href="/home/mycarts" >
                    购物车
                    <!-- ngIf: foodCount.count -->
                </a>

                <div class="toolbar-separator"></div>
                <a class="toolbar-btn icon-line-profile toolbar-open modal-hide" id="info" href="/home/myinfo">
                    <!-- ngIf: messageCount.count -->
                </a>

                <div class="tooltip tooltip-placeleft" style="display: none;" id="myorder">
                    <div class="tooltip-arrow"></div>
                    <div class="tooltip-content">我的订单</div>
                </div>

            </div>

            <script> 

                $('#order').hover(function(){
                    $('#myorder').attr('style','left:-82px;top:8px');
                    $('.tooltip-content').text('我的订单');
                },function(){
                     $('#myorder').attr('style','display:none');
                });

                $('#info').hover(function(){
                    $('#myorder').attr('style','left:-82px;top:159px;');
                    $('.tooltip-content').text('我的资料');
                },function(){
                     $('#myorder').attr('style','display:none');
                });


                $(window).scroll(function(){
                    var aa = $(this).scrollTop();
                    if(aa >= 150){
                        $('#htop').attr('style','display:block');

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
                        <a href="javascript:" target="_blank">
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
   
</div>
@section('payend')
    @section('orderdetail')

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
                            <span class="topbar-profilebox-avatar icon-profile" id="asd">
                            </span>

                            <span class="onlyou">
                                <a href="/home/login">
                                    登录
                                </a>
                                |
                                <a href="/home/reg">
                                    注册
                                </a>
                            </span>

                            <span class="topbar-profilebox-wrapper ng-hide">
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
                                    <a class="icon-star" href="/home/collect">
                                        我的收藏
                                    </a>
                                    <a class="icon-location" href="/home/myinfo">
                                        我的地址
                                    </a>
                                    <a class="icon-setting" href="/home/updatepwd">
                                        修改密码
                                    </a>
                                    <a class="icon-logout" href="/home/logout">
                                        退出登录
                                    </a>
                                </div>
                            </span>

                            <script>
                                var name = '<?= Session::get('homeUser.uname')?>';
                                    if(name){
                                       $('.topbar-profilebox-wrapper').removeClass('ng-hide');
                                       $('#asd').addClass('ng-hide');
                                       $('.onlyou').addClass('ng-hide');


                                       var upic = '<?= Session::get('homeUser.upic')?>';
                                        if(upic){
                                            $('img.topbar-profilebox-avatar').removeClass('ng-hide');
                                        }
                                    }
                            </script>
                            
                        </div>
                    </div>
                </nav>
            </div>
        </header>
    </div>
    @show
@section('content')


 
 

@show
<style>
    .footer-link ul li{
        list-style: none;
        text-decoration: none;
        float: left;
        height: 38px;
        width: 92px;
        margin:1px;
        text-align:center;
    }
    .footer-link ul li:hover{
        border: 1px solid pink;
        cursor: pointer;
    }
</style>
    <?php
        use App\AdminLinks;
        $links = AdminLinks::where('status','=',1)->get();
    ?>

    <footer class="footer">
        <div class="container clearfix">
            <div class="footer-link" style="width:945px; ">
               <ul>
                    @foreach($links as $k=>$v)
                   <li><a href="{{$v->ylinks}}"><img src="{{$v->ypic}}"></a></li>
                   @endforeach
               </ul> 
                
            </div>
            <div class="footer-contect" style="width:230px;">
                <div class="footer-contect-item">
                    24小时客服热线 :
                    <a class="inherit" href="tel:10105757">
                        10105757
                    </a>
                </div>
                <div class="footer-contect-item">
                    关注我们 :
                    <div href="JavaScript:" class="icon-wechat">
                        <div class="dropbox dropbox-bottom footer-contect-dropbox">
                            <img src="/home/images/weixin.png">
                            <p>
                                微信号: elemeorder
                            </p>
                            <p>
                                饿了么网上订餐
                            </p>
                        </div>
                    </div>
                    <a class="icon-weibo" href="www.sina.com"></a>
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

@show

    @section('js')
    

    @show
</body>

</html>