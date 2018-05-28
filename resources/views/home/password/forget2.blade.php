<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>忘记密码</title>
<link rel="shortcut icon" href="/home/images/log.png" type="image/png">
<link type="text/css" href="/home/css/css.css" rel="stylesheet" />
<link href="/home/css/vendor11.css" rel="stylesheet">
<link href="/home/css/login.css" rel="stylesheet">

<script src="/home/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
 //导航定位
 $(function(){
	 $(".selyz").change(function(){
	   var selval=$(this).find("option:selected").val();
		 if(selval=="0"){
			 $(".sel-yzsj").show()
			 $(".sel-yzyx").hide()
			 }
		 else if(selval=="1"){
			 $(".sel-yzsj").hide()
			 $(".sel-yzyx").show()
			 }
		 })
	 })
</script>
</head>

<body>

  <div class="content">
    <div class="LoginHeader-1jXn6" style="margin-top:20px;">
        <img src="/home/images/logo.png">
    </div>
   <div class="web-width">
     <div class="for-liucheng">
      <div class="liulist for-cur"></div>
      <div class="liulist for-cur"></div>
      <div class="liulist"></div>
      <div class="liulist"></div>
      <div class="liutextbox">
       <div class="liutext for-cur"><em>1</em><br /><strong>填写用户名</strong></div>
       <div class="liutext for-cur"><em>2</em><br /><strong>验证身份</strong></div>
       <div class="liutext"><em>3</em><br /><strong>设置新密码</strong></div>
       <div class="liutext"><em>4</em><br /><strong>完成</strong></div>
      </div>
     </div>
	
	@if(session('err')) 
        <div id="code" style="width:550px;height:120px;text-align:center;line-height:120px;background-color:#666;color:white;font-size:42px;border-radius:60px 60px;margin-left:320px;position:absolute;z-index:1; opacity:0.9;">{{session('err')}}</div>
    @endif

    <script>
        $('#code,.mws-form-message').delay(2000).fadeOut(10); 
    </script>
    <script>

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

                $.get('/home/passwordAjax',{tel:phone},function(data){
                    if(data==0){
                      var aa = $(`<div id="code" style="width:550px;height:120px;text-align:center;line-height:120px;background-color:#666;color:white;font-size:42px;border-radius:60px 60px;margin-left:320px;position:absolute;z-index:1;">该号码未注册</div>`);
                      $('.for-liucheng').after(aa);
                      setTimeout(function(){
                          aa.remove();
                          window.location.reload();
                      },1500);

                    }else{
                      $.post('/home/yzm',{number:phone},function(data){
                          console.log(data);
                      })
                    }
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

     <form action="/home/doforget2" method="post" class="forget-pwd">
      {{ csrf_field() }}
       <section class="MessageLogin-FsPlX" style="width:330px;">
        <input type="text" name="tel" onfocus="send()" maxlength="11" placeholder="手机号">
            <button id="yanzheng" disabled type="button" class="CountButton-3e-kd">获取验证码</button>
        </section>
        <section class="MessageLogin-FsPlX" style="width:330px;">
                <input type="tel" name="number" maxlength="6" placeholder="验证码">
        </section>
       
       <button class="tijiao" style="background-color:#f60;margin-top:30px;margin-left: 90px;">提交
      </button>
      </form>
   </div>
  </div>
  
</body>
</html>