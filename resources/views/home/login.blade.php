<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="UTF-8">
    <title>饿了么-登录</title>
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

                
            </script>

        
        <div>

            <form action="/home/dologin" method="post">
                {{ csrf_field() }}
                <section class="form-b6px1">
                    <input type="text" name="uname" autocapitalize="on" placeholder="用户名">

                </section>
                <section class="form-b6px1">
                    <input placeholder="密码" name="password" type="password" autocapitalize="on">

                    <div id="show" class="SwitchButton-2b6RO SwitchButton-3BmOw">
                       <div class="SwitchButton-1rBfm"></div>
                       <a>···</a> 
                    </div>
                </section>
                <section class="form-b6px1">
                        <input type="text" name="code" maxlength="6" placeholder="验证码">
                        <div class="form-2o2sO">
                            <a onclick="javascript:re_captcha();" >
                                <img src="{{ URL('home/code/1') }}" id="huan">
                            </a>
                            <div class="form-2DBWI" onclick="javascript:re_captcha();">
                                <div>看不清</div>
                                <span>换一张</span>
                            </div>
                        </div>
                    </section>

                <button class="SubmitButton-2wG4T">
                  登录
                </button>
            </form>
        </div>
    </div>

    <script src="./js/jquery-3.2.1.min.js"></script>
    
    <script>  

        function re_captcha() {
            $url = "{{ URL('home/code') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('huan').src=$url;
          }

        var i=1;
        $('.SwitchButton-1rBfm').click(function(){

            i++;

            if(i%2==0){
                $('#show').removeClass('SwitchButton-3BmOw');
                $('#show').addClass('SwitchButton-3wLB9');
                $('#show a').html('abc');
                $('input[name=password]').attr('type','text');
                
            }else{
                $('#show').removeClass('SwitchButton-3wLB9');
                $('#show').addClass('SwitchButton-3BmOw');
                $('input[name=password]').attr('type','password');
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