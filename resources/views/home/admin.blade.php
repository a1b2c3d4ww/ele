<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Plugin Stylesheets first to ease overrides -->
<link rel="stylesheet" type="text/css" href="/admins/plugins/colorpicker/colorpicker.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/custom-plugins/wizard/wizard.css" media="screen">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admins/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admins/css/mws-style.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol16.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/icons/icol32.css" media="screen">

<!-- Demo Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/demo.css" media="screen">

<!-- jQuery-UI Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/jui/css/jquery.ui.all.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/jui/jquery-ui.custom.css" media="screen">

<!-- Theme Stylesheet -->
<link rel="stylesheet" type="text/css" href="/admins/css/mws-theme.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/themer.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admins/css/admins.css" media="screen">


<title>@yield('title')</title>
<style type="text/css">
    
</style>
</head>

<body>
	<!-- Header -->
	<div id="mws-header" class="clearfix">
    
    	<!-- Logo Container -->
    	<div id="mws-logo-container">
        
        	<!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        	<div id="mws-logo-wrap">
            	<span style='color:white;font-size:20px'>饿了么后台系统</span>
			</div>
        </div>
        
        <!-- User Tools (notifications, logout, profile, change password) -->
        <div id="mws-user-tools" class="clearfix">
        
        	<!-- Notifications -->
        	<div id="mws-user-notif" class="mws-dropdown-menu">
            	
                
               
                
            
            </div>
            
            <!-- Messages -->
         
            
            <!-- User Information and functions section -->
            <div id="mws-user-info" class="mws-inset" style="padding: 0px;margin: 0px">
                        
                <!-- Username and Functions -->
                <div id="mws-user-functions" style="padding: 0px;margin: 0px">
                    <div id="mws-username">
                        Hello, lamp201
                    </div>
                    <ul>
                    	
                        <li><a href="#">修改密码</a></li>
                        <li><a href="index.html">退出</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>
            
        	<!-- Searchbox -->
        	
            
            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
                    
                    <li>
                        <a href="#"><i class="icon-users"></i>后台用户管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/user/create">添加后台用户</a></li>
                            <li><a href="/admin/user">后台用户列表</a></li>
                        </ul>
                    </li>      
                    <li>
                        <a href="#"><i class="icon-user"></i>用户管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/member/create">添加用户</a></li>
                            <li><a href="/admin/member">用户列表</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="icon-chevron-down"></i>链接管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/links/create">添加链接</a></li>
                            <li><a href="/admin/links">链接列表</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="icon-ok-sign"></i>轮播管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/adver/create">添加轮播</a></li>
                            <li><a href="/admin/adver">轮播列表</a></li>
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="icon-ok-sign"></i>订单管理</a>
                        <ul class='closed'>                        
                            <li><a href="/admin/orders">订单列表</a></li>
                        </ul>
                    </li>          
                   <li>
                        <a href="#"><i class="icon-list"></i>分类管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/cate/create">添加分类</a></li>
                            <li><a href="/admin/cate">分类列表</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="icon-github-2"></i>商家管理</a>
                        <ul class='closed'>
                            <li><a href="/admin/merchant/create">添加商家</a></li>
                            <li><a href="/admin/merchant">商家列表</a></li>
                            <li><a href="/admin/greencate/index">菜品分类列表</a></li>
                            <li><a href="/admin/green/index">菜品列表</a></li>
                        </ul>
                    </li>  

                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
            @section('content')


            @show
               
            </div>
            <!-- Inner Container End -->
                       
            <!-- Footer -->
           
            
        </div>
        <!-- Main Container End -->
        
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admins/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admins/js/libs/jquery.mousewheel.min.js"></script>
    <script src="/admins/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admins/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admins/jui/js/jquery-ui-1.9.2.min.js"></script>
    <script src="/admins/jui/jquery-ui.custom.min.js"></script>
    <script src="/admins/jui/js/jquery.ui.touch-punch.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admins/plugins/datatables/jquery.dataTables.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/admins/js/libs/excanvas.min.js"></script>
    <![endif]-->
    <script src="/admins/plugins/flot/jquery.flot.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.tooltip.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.pie.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.stack.min.js"></script>
    <script src="/admins/plugins/flot/plugins/jquery.flot.resize.min.js"></script>
    <script src="/admins/plugins/colorpicker/colorpicker-min.js"></script>
    <script src="/admins/plugins/validate/jquery.validate-min.js"></script>
    <script src="/admins/custom-plugins/wizard/wizard.min.js"></script>

    <!-- Core Script -->
    <script src="/admins/bootstrap/js/bootstrap.min.js"></script>
    <script src="/admins/js/core/mws.js"></script>

    <!-- Themer Script (Remove if not needed) -->
    <script src="/admins/js/core/themer.js"></script>

    <!-- Demo Scripts (remove if not needed) -->
    <script src="/admins/js/demo/demo.dashboard.js"></script>

    @section('js')


    @show

</body>
</html>