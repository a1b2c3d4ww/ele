<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>饿了么-注册</title>
    <link rel="shortcut icon" href="/home/images/log.png" type="image/png">
    <link href="/home/css/vendor11.css" rel="stylesheet">
    <link href="/home/css/login.css" rel="stylesheet">
</head>
<body>
    <div class="App-1EAON">
        <div class="App-3Q8Qb">
            <div class="LoginHeader-1jXn6">
                <img src="/home/images/logo.png">
            </div>
             
            <div>

                @if (count($errors) > 0)
                    <div class="mws-form-message error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <div style="width:550px;height:120px;text-align:center;line-height:120px;background-color:#666;color:white;font-size:42px;border-radius:60px 60px;margin:auto -100px;position:absolute;z-index:1;">{{ $error }}</div>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('err')) 
                    <div id="code" style="width:550px;height:120px;text-align:center;line-height:120px;background-color:#666;color:white;font-size:42px;border-radius:60px 60px;margin:auto -100px;position:absolute;z-index:1;">{{session('err')}}</div>
                @endif

                <script src="/home/js/jquery-3.2.1.min.js"></script>
                <script>
                        $('#code,.mws-form-message').delay(2000).fadeOut(10); 

                        function send(){
                            var into =  setInterval(function(){
                                var reg = /^1[3456789]\d{9}$/;
                                var phone = $('button[type=button]').siblings().val();
                                var res = reg.exec(phone);

                                if(res){
                                    $('button[type=button]').removeAttr('disabled');
                                }else{
                                    $('button[type=button]').attr('disabled','disabled');
                                }

                            },100);

                            var time; //timer变量，控制时间
                            var count = 30; //间隔函数，1秒执行
                            var others;//当前剩余秒数

                            $('#yanzheng').click(function(){
                              　others = count;
                                clearInterval(into);
                                $(this).attr("disabled", "true");
                                $(this).html("已发送" +'('+ others +'s'+')');
                                $('input[maxlength=11]').attr('onfocus','this.blur()');
                                time = window.setInterval(dotime, 1000); //启动计时器，1秒执行一次
                            　　  
                                var phone = $(this).siblings().val(); 
                                
                                $.ajaxSetup({
                                  headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                  }
                                }); 

                                var phone = $('button[type=button]').siblings().val();
                                
                                $.post('/home/yzm',{number:phone},function(data){
                                    console.log(data);
                                })
                                 
                            })

                            //timer处理函数
                            function dotime() {
                                if (others == 0) {                
                                    window.clearInterval(time);//停止计时器
                                    $("#yanzheng").removeAttr("disabled");//启用按钮
                                    $('input[maxlength=11]').removeAttr('onfocus','this.blur()');
                                    $("#yanzheng").html("重新发送");

                                    var onto =  setInterval(function(){
                                        var reg = /^1[3456789]\d{9}$/;
                                        var phone = $('button[type=button]').siblings().val();
                                        var res = reg.exec(phone);

                                        if(res){
                                            $('button[type=button]').removeAttr('disabled');

                                        }else{
                                            $('button[type=button]').attr('disabled','disabled');
                                        }

                                    },100);

                                    $('#yanzheng').click(function(){
                                        clearInterval(onto);
                                    })
                                    
                                    
                                }
                                else {
                                    others--;
                                    $("#yanzheng").html("已发送" +'('+ others +'s'+')');
                                }
                            }
                        }
                </script>
                <form action="/home/doreg" method="post">

                    {{csrf_field()}}
                    <section class="form-b6px1">
                        <input type="text" name="uname" placeholder="请输入 4~12位 用户名">

                    </section>
                    
                    <section class="form-b6px1">
                        <input placeholder="请输入 6-16位 密码" name="password" type="password">

                        <div id="show" class="SwitchButton-2b6RO SwitchButton-3BmOw">
                           <div class="SwitchButton-1rBfm"></div>
                           <a>···</a> 
                        </div>
                    </section>

                    <section class="form-b6px1">
                        <input placeholder="确认密码" name="repass" type="password">
                    </section>

                    <section class="MessageLogin-FsPlX">
                    <input type="text" name="tel" onfocus="send()" maxlength="11" placeholder="手机号">
                        <button id="yanzheng" disabled type="button" class="CountButton-3e-kd">获取验证码</button>
                    </section>
                    <section class="MessageLogin-FsPlX">
                            <input type="tel" name="number" maxlength="6" placeholder="验证码">
                    </section>

                        <button class="SubmitButton-2wG4T">
                          立即注册
                        </button>
                </form>
            </div>
        </div>
            
        
        <script src="/home/js/jquery-3.2.1.min.js"></script>
        <script>      
            var i=1;
            $('.SwitchButton-1rBfm').click(function(){

                i++;

                if(i%2==0){
                    $('#show').removeClass('SwitchButton-3BmOw');
                    $('#show').addClass('SwitchButton-3wLB9');
                    $('#show a').html('abc');
                    $('input[name=password]').attr('type','text');
                    $('input[name=repass]').attr('type','text');
                    
                }else{
                    $('#show').removeClass('SwitchButton-3wLB9');
                    $('#show').addClass('SwitchButton-3BmOw');
                    $('input[name=password]').attr('type','password');
                    $('input[name=repass]').attr('type','password');
                    $('#show a').html('···');
                }       
            });
        </script>
        <div class="App-OjtAb">
            <div class="LoginFooter-UxQIr">
                <div class="LoginFooter-2KaAB">
                    <h2>所有方：上海拉扎斯信息科技有限公司</h2>
                    <p> 增值电信业务许可证 : 
                        <a href="http://www.shca.gov.cn/" target="_blank" class="LoginFooter-3s25U">沪B2-20150033</a>
                        <a href="http://www.miibeian.gov.cn/" target="_blank" class="LoginFooter-3s25U">沪ICP备 09007032</a>
                        <a href="http://www.sgs.gov.cn/lz/licenseLink.do?method=licenceView&amp;entyId=20120305173227823" target="_blank"> 上海工商行政管理 </a> Copyright ©2008-2017 ele.me, All Rights Reserved. 
                    </p>
                    <a href="http://www.zx110.org/picp/?sn=310100103568" rel="nofollow" target="_blank" class="LoginFooter-1QHDG">
                        <img src="/home/images/gongshang.jpg" alt="已通过沪公网备案，备案号 310100103568" height="30">
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>