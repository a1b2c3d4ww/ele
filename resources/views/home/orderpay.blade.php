<!DOCTYPE html>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>
            饿了么-收银台
        </title>
        <link rel="icon" href="/home/images/log.png" type="image/png">
        <link href="/home/css/app.bf5cec.css" rel="stylesheet">
        <script src="/home/js/ubt.min.js" type="text/javascript"></script>
        <script src="/home/js/jquery-3.2.1.min.js" type="text/javascript"></script>
        <script src="/home/js/perf.min.js" type="text/javascript"></script>
        <script src="/home/js/uparams.min.js" type="text/javascript"></script>
        <script src="/home/js/vendor.e8b6d1.js" type="text/javascript"></script>
    </head>
    
    <body>
        <header id="header">
            <i class="eleme-icon logo">
                <h1 class="title">
                    收银台
                </h1>
            </i>
        </header>
                <section class="container order">
                    <h3 class="text-muted">
                        订单详情
                    </h3>
                    <div class="order-detail clearfix">
                        <div class="pull-left">
                            <p class="text-muted">


                                {{$mname}}外卖订单
                            </p>
                            <p class="">
                                <span class="text-muted text-ellipsis order-desc">
                                   {{$user['uname']}}(先生) {{$user['tel']}} {{$user['addr']}}
                                </span>
                             
                            </p>


                        </div>
                        <p class="pull-right">
                            <span>
                                <span>
                                    支付金额：
                                </span>
                                <strong class="text-lg text-highlight">
                                    <span>
                                        ¥
                                    </span>
                                    <span>


                                       {{$sum}}


                                    </span>
                                </strong>
                            </span>
                        </p>
                    </div>
                </section>
                <section class="container paymethods">
                    <header>
                        <h3>
                            请选择支付方式
                        </h3>
                        <p class="text-muted">
                            <span>
                                剩余支付时间
                            </span>


                            <span id="minute" style="color: red">
                                 
                            </span>分
                            <span id="second" style="color: red">
                                
                            </span> 秒
                                


                            <span>
                                ，逾期订单将自动取消
                            </span>
                        </p>
                    </header>
                    <section class="native-payment-list clearfix hidden">
                        <p class="title text-muted">
                            <span>
                                饿了么钱包支付
                            </span>
                            <span class="text-highlight text-money">
                            </span>
                        </p>
                        <div class="pull-left" >
                            <p class="text-error" >
                            </p>
                        </div>
                        <p class="pull-left show-third text-primary">
                            <span class="show-third-payment hidden">
                                <span data-reactid=".0.1.1.2.0.0">
                                    查看其他支付方式
                                </span>
                                <span class="iconfont icon-arrow">
                                </span>
                            </span>
                        </p>
                    </section>
                    <section class="third-payment">
                        <div data-reactid=".0.1.2.0">
                            <p class="title text-muted">
                                <span>
                                    第三方支付
                                </span>
                                <span class="text-highlight text-money">


                                    ￥ {{$sum}}


                                </span>
                            </p>

                            <ul class="third-payment-list clearfix" id="pay">
                                <li class="alipay active">
                                    <div class="payment-lsit-item-content">
                                        <h4>
                                            支付宝
                                        </h4>
                                        <small class="text-muted">
                                        </small>
                                    </div>
                                </li>
                                <li class="weixin">
                                    <div class="payment-lsit-item-content" >
                                        <h4>
                                            微信支付
                                        </h4>
                                        <small class="text-muted">
                                        </small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </section>

                    <script>
                        $('#pay').find('li').click(function(){
                            $(this).addClass('active');
                            $(this).siblings().removeClass('active');
                        });
                    </script>

                    <footer class="paypassword">
                        <form class="hide" name="password">
                            <div class="title">
                                <p>
                                    <span>
                                        为保障您的钱包资金安全, 请输入
                                    </span>
                                    <strong>
                                        支付密码
                                    </strong>
                                </p>
                            </div>
                            <section class="form-group">
                                <input placeholder="请输入6位支付密码" class="" type="password" value="">
                                <span class="text-muted hidden">
                                    如您忘记密码, 请前往商家版手机端修改
                                </span>
                                <a class="text-primary text-link">
                                    忘记密码?
                                </a>
                            </section>
                            <p class="hidden" data-reactid=".0.1.3.1.2">
                            </p>
                        </form>
                        <section class="messagebox-backdrop" style="display:none;" data-reactid=".0.1.3.2">
                            <div class="messagebox " data-reactid=".0.1.3.2.0">
                            </div>
                        </section>
                        <section class="modal-backdrop" style="display:none;" data-reactid=".0.1.3.3">
                            <div class="modal" data-reactid=".0.1.3.3.0">
                                <section class="timeout clearfix">
                                    <header class="clearfix">
                                        <span class="icon-close pull-right text-muted">
                                            x
                                        </span>
                                    </header>
                                    <i class="eleme-icon icon-error pull-left">
                                    </i>
                                    <div class="pull-left clearfix">
                                        <strong>
                                        </strong>
                                        <p class="text-muted">
                                        </p>
                                        <footer>
                                            <button class="btn btn-lg btn-primary">
                                            </button>
                                            <button style="display:none;" class="btn btn-default btn-lg">
                                            </button>
                                        </footer>
                                    </div>
                                </section>
                            </div>
                        </section>
                        <button type="button" class="btn btn-success btn-lg">


                            <a href="/home/orderest/finish" style="text-decoration:none;color:white">确认支付</a>


                        </button>
                    </footer>
                </section>
                <section class="messagebox-backdrop" style="display:none;" data-reactid=".0.2">
                    <div class="messagebox ">
                    </div>
                </section>
       
    </body>


    <script type="text/javascript">
          var minute = "4";
          var second = 59;
         setInterval(function() {
              second--;
          if(second == 00 && minute == 00) {
              minute = 5;
              second = 59;
         }; //当分钟和秒钟都为00时，重新给值
         if(second == 00) {
             second = 59;
             minute--;
             if(minute < 10) minute = "0" + minute;
         }; //当秒钟为00时，秒数重新给值
         if(second < 10) second = "0" + second;
         $("#minute").text(minute);
         $("#second").text(second);
     }, 1000);
 </script>



</html>