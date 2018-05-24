
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{$title}}</title>
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/admins/1.png" type="image/x-icon" />
    <link rel="stylesheet" href="/admins/css/font.css">
  <link rel="stylesheet" href="/admins/css/xadmin.css">
    <script type="text/javascript" src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
    <script src="/admins/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/admins/js/xadmin.js"></script>

</head>
<body class="login-bg">
    
    <div class="login">
        <div class="message">后台管理登录</div>
        <div id="darkbannerwrap">
      
        </div>
        @if(session('err'))
      <li style='color:black;font-size:17px;list-style:none'>{{session('err')}}</li>
      @endif
        
        <form action='/admin/dologin' method="post" class="layui-form" >
            <input name="aname" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
      {{csrf_field()}}
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>
</body>
</html>