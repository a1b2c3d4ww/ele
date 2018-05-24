@extends('layout.home')

@section('title','商家详情')

@section('content') 

    
    <script>
        $('header').addClass('shoptopbar');
        $('#che').addClass('ng-hide');
        $('body').attr('class','hidesidebar');
    </script>
<div class="shopguide ng-isolate-scope" shop-guide="" data="shop">
    <div class="container" ng-show="shop">
        <div class="shopguide-info">
            

	
           
            <img src="{{$merchant->mpic}}">
          
            <div class="shopguide-info-wrapper">
                <div>
                    <h1 title="肯德基宅急送(昌平店）" itemprop="name" class="ng-binding">
                        {{$merchant->mname}}
                    </h1>
                    <!-- ngIf: shop.tip -->
                    <a ng-href="/shop/257475/info" href="#">
                        <!-- ngIf: isJingHua -->
                    </a>
                </div>
                <p class="shopguide-info-rate">
                    <div class="starrating icon-star ng-isolate-scope" title="评分5.0分" rate-star=""
                    rating="shop.rating">
                        <span class="icon-star" style="width: 100%;">
                        </span>
                    </div>
                    (
                    <a class="ng-binding" href="#">
                        107
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
                    <li class="shopguide-extra-item shopguide-extra-compete ng-scope">
                        <div itemscope="" itemprop="aggregateRating">
                            <h2 class="color-stress ng-binding" itemprop="ratingValue">
                                5.0
                            </h2>
                            <meta itemprop="bestRating" content="5">
                            <meta itemprop="reviewCount" content="107">
                            <p>
                                综合评价
                                <br>
                                <span class="color-mute ng-binding">
                                    高于周边商家
                                </span>
                                <!-- ngIf: shopRatingScore.compare_rating -->
                                <span class="color-stress ng-binding ng-scope">
                                    81.3%
                                </span>
                                <!-- end ngIf: shopRatingScore.compare_rating -->
                            </p>
                        </div>
                        <div>
                            <p>
                                服务态度
                                <div class="starrating icon-star ng-isolate-scope" title="评分5.0分">
                                    <span class="icon-star" style="width: 100%;">
                                    </span>
                                </div>
                                <span class="color-stress ng-binding">
                                    5.0分
                                </span>
                            </p>
                            <p>
                                菜品评价
                                <div class="starrating icon-star ng-isolate-scope" title="评分4.7分">
                                    <span class="icon-star" style="width: 93.5544%;">
                                    </span>
                                </div>
                                <span class="color-stress ng-binding">
                                    4.7分
                                </span>
                            </p>
                        </div>
                    </li>
                    <!-- end ngIf: shopRatingScore -->
                    <!-- ngIf: shop.description -->
                    <li class="shopguide-extra-item ng-binding ng-scope" ng-if="shop.description"
                    itemprop="description">
                       {{$merchant->mname}}
                    </li>
                    <!-- end ngIf: shop.description -->
                    <li class="shopguide-extra-item address">
                        <p itemscope="" itemprop="streetAddress">
                            <span class="label">
                                商家地址：
                            </span>
                            <span class="ng-binding">
                                北京市昌平区鼓楼南街斜侧新世纪商城
                            </span>
                            <meta itemprop="telephone" content="4009208801">
                        </p>
                        <p>
                            <span class="label">
                                营业时间：
                            </span>
                            <span itemprop="openingHours" class="ng-binding">
                                05:45-04:00
                            </span>
                        </p>
                    </li>
                    <li class="shopguide-extra-item">
                        <p class="shopguide-extra-delivery">
                            由
                            <span class="ng-binding">
                                {{$merchant->mname}}
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
                    0元
                </em>
            </span>
            <span ng-hide="shop.id == 656683" class="">
                <em>
                    配送费
                </em>
                <em class="shopguide-server-value ng-binding">
                    配送费¥6
                </em>
                <!-- ngIf: shop.delivery_mode.description -->
            </span>
            <span ng-hide="shop.id == 656683" class="">
                <em>
                    平均送达速度
                </em>
                <em class="shopguide-server-value ng-binding">
                    30分钟
                </em>
            </span>
        </div>
        @if($enshrine)
        <a class="shopguide-favor"  " href="#">

            <i ng-if="!isFavorShop"  class="icon-unfavorite xin ng-scope">
            </i>
            <span ng-if="!isFavorShop"  class="ng-scope enshrine">
                取消收藏
            </span>
        </a>
        @else
        <a class="shopguide-favor"  " href="#">

            <i ng-if="!isFavorShop"  class="icon-favorite xin ng-scope">
            </i>
            <span ng-if="!isFavorShop"  class="ng-scope enshrine">
                收藏
            </span>
        </a>
        @endif
    </div>
</div>
<div class="ng-scope ng-isolate-scope">
    <div class="shopnav">
        <div class="container clearfix">
            <div class="shopnav-left">
                
                <a class="shopnav-tab active" href="javascript:">
                    所有商品
                </a>
                <a class="shopnav-tab" href="/home/reviews/7">
                    评价
                </a>
                <a class="shopnav-tab" href="javascript:">


                    商家资质
                </a>
                
             <div ng-show="!loading &amp;&amp; !searchEnv" class="shopmenu-nav ng-isolate-scope"
sticky="" sticky-class="sticky" sticky-body-class="shopmenu-nav-sticky"
sticky-fn="shopNavSticky">
    @foreach($data as $k=>$v)
    <!-- ngRepeat: category in categorys -->
    <a href="#miao{{$k}}" ng-repeat="category in categorys" ng-click="scrollToCategory(category)"
    ng-class="{active: currentCategory.id === category.id}" class="ng-binding ng-scope ">
        {{$v->fname}}
    </a>
     @endforeach
    <!-- end ngRepeat: category in categorys -->
            </div>
              
               
                <span class="shopnav-filter ng-scope">

                </span>

                <!-- end ngIf: shopAction===' menu' -->
            </div>
   
        </div>
    </div>
</div>

<div class="shopmain clearfix container ng-scope">
    <div class="shopmenu ng-isolate-scope">
        <div class="shopmenu-main grid" style="margin-top: 0px;">           
            <div class="ng-scope">
                @foreach($data as $k=>$v)
                <div class="shopmenu-list clearfix ng-scope" ng-repeat="category in categorys">
                    <h3 class="shopmenu-title ng-binding">
                        <a name="miao{{$k}}"></a>
                        {{$v->fname}}
                        
                        <span class="shopmenu-des ng-binding">
                            
                        </span>
                    </h3>
                     @foreach(getGreens($v->fid) as $kk=>$vv)

                    <div class="shopmenu-food ng-isolate-scope">
                        
                        <!-- ngIf: food.image_path -->
                        <span class="col-1 ng-scope" ng-if="food.image_path">
                            <a href="javascript:" ng-click="showInfo(food)">
                                <img src="{{$vv->gpic}}">
                            </a>
                        </span>
                        <!-- end ngIf: food.image_path -->
                        <div class="col-2 shopmenu-food-main">
                            <h3 class="shopmenu-food-name ui-ellipsis ng-binding">
                                {{$vv->gname}}
                            </h3>
                            <p class="color-mute ui-ellipsis ng-binding">
                               {{$vv->details}}
                            </p>
                            <p>
                                <div class="starrating icon-star ng-isolate-scope" title="评分0.0分" rate-star=""
                                rating="food.rating">
                                    <span class="icon-star" style="width: 0%;">
                                    </span>
                                </div>
                                <span class="color-mute ng-binding">
                                
                                </span>
                                
                            </p>
                        </div>
                        <span class="col-3 shopmenu-food-price color-stress ng-binding">
                            {{$vv->price}}<small class="ng-binding"></small>
                        </span>
                        <span class="col-4">
                            <div class="ng-isolate-scope">

                                <div class="ng-scope" >
                                      
                                    <div class="shop-cartctrl ng-scope" name="abcde" >

                                      

                                        <button class="ctrl minus" name="jian" value=" {{$vv->gid}}">
                                            -
                                        </button>
                                        <input class="ctrl quantity ng-pristine ng-valid" disabled value="0">
                                        <button class="ctrl plus" name="jia" value=" {{$vv->gid}}">
                                            +
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                        </span>
                    </div>
                    @endforeach
                </div>
                 @endforeach
            </div>
                
                
            <script src="/home/js/jquery.fly.min.js" type="text/javascript"></script>
            <script>
                   var a =  $('button[name=jia]').length;
                   // var gid =  $('button[name=jia]').val();
                   // console.log(gid);
                   var sum = 0; 
                   var gname; 
                   var j=0;
                    var arrs = [];
                    var arr = Array(a).fill(0);
                   $('button[name=jia]').each(function(index,element){
                        // var gname;

                        this.onclick = function(){
                                
                        var gid = $(this).val();
                        $('.shop-cartbasket-empty').remove();
                          
                        var aa = $(window).scrollLeft();
                        var bb = $(window).scrollTop();
                        var flyer = $('<div class="shop-flyitem"></div>');
                       
                        arr[index]++;

                       $(this).siblings().eq(1).val(arr[index]);
                      
                        for(var i = 0; i < arr.length; i++) {
                                    sum += arr[i];

                            }      

                            $.get('/home/addcartajax/'+gid,{},function(data){
                                
                               // console.log(arr[index]);
                                  if(!arrs.contains(gid)){
                                      arrs.unshift(gid);
                                   }
                                       var ins = arrs.indexOf(gid);
                                       $('.itemname').eq(ins).val(data.gname)
                                       $('.count').eq(ins).val(arr[index]);
                                       $('.count').eq(ins).val(arr[index]);
                                       $('.itegid').eq(ins).val(gid);
                                       $('.price').eq(ins).val(arr[index]*data.price);
                                         
                                 })
                            
                          // console.log(index);
                       
                        flyer.fly({
                            start:{
                                left:event.clientX,
                                top:event.clientY
                            },
                            end:{
                                left:$('#mycart').offset().left-aa+10,
                                top: $('#mycart').offset().top-bb,
                                width: 20,
                                height: 20
                            },
                            onEnd:function(){
                                flyer.remove();
                            }
                        })

                            $('#btn-add').html(sum);
                            $('#btn-add').addClass('shop-cartpieces');
                            $('#jiesuan').removeClass('disabled');
                            $('#jiesuan').removeAttr('disabled');
                        
                            sum =0;       
                            // return gname;
                           
                        }
                       
                       // console.log(arr);
              
                    })

                   Array.prototype.in_array = function (element) {  

                　　for (var i = 0; i < this.length; i++) {  

                　　if (this[i] == element) {  

                　　return true;  

                        }  

                    } return false;  

                }  
                   // function up(){

                   $('button[name=jian]').each(function(index,element){
                                
                        $(this).click(function(){
                            arr[index] = $(this).siblings().eq(0).val();

                            arr[index]--;
                            if(arr[index] < 0){
                                arr[index] = 0;
                            }
                            var gid = $(this).val();
                            $(this).siblings().eq(0).val(arr[index]);

                            for(var i = 0; i < arr.length; i++) {
                                    sum += arr[i];
                            }   
                               $.get('/home/subcartajax/'+gid,{},function(data){
                                if(!arrs.contains(gid)){
                                      arrs.unshift(gid);
                                   }

                                       var ins = arrs.indexOf(gid);
                                       $('.itemname').eq(ins).val(data.gname)
                                       $('.count').eq(ins).val(arr[index]);
                                      // console.log(arr[index]) ;
                                       $('.itegid').eq(ins).val(arrs);
                                       // 
                                       $('.price').eq(ins).val(arr[index]*data.price);
                              

                             })
                            var aa =  $('#btn-add').text(sum);
                            sum =0;

                            if(aa.text()<1){
                                $('#btn-add').removeClass('shop-cartpieces');
                                $('#btn-add').empty();
                                $('#jiesuan').addClass('disabled');
                                $('#jiesuan').attr('disabled');
                                $('#jiesuan').text('购物车是空的');
                            };
                        })    
                    })
                    
                    Array.prototype.contains = function(obj) {  
                            var i = this.length;  
                            while (i--) {  
                                if (this[i] === obj) {  
                                 return true;  
                                }  
                            }  
                            return false;  
                        }  
               // }
               // up();

                    function hhh(){
                       $('div[name=abcde] input').each(function(){
                            $(this).val(0);
                            $('#btn-add').html(0);
                            $('#btn-add').empty();
                            $('#shopbasket').attr('style','top:-44px;height:auto;');
                            $('#btn-add').removeClass('shop-cartpieces');
                            arr.fill(0);
                       })
                            $('#jiesuan').addClass('disabled');
                                $('#jiesuan').attr('disabled');
                                $('#jiesuan').text('购物车是空的');
                            $('.shop-cartbasket-tablerow').remove();
                            // only();
                   }

            </script>
            <style>
                .mine{border:0px;color:#666;font-size:13px;text-overflow:ellipsis;margin-left:0px;width:140px;height:28px;}
                .your{font-size:11px;color:#666;border:1px solid #ddd;margin-left:10px;text-align:center;width:40px;height:22px;}
                .her{border:0px;color:#666;color:#F17530; margin-left:15px; margin-right:10px;width:30px;height:28px;text-align:right;}
            </style>
            <script>
                 $('.carts').each(function(){
                    $(this).click(function(){
                    var gid = $('input[name=hide]').val();
                    // $(this).siblings().find('.ng-valid').val(1);
                    // console.log(gid);
                    $(this).hide();
                    $(this).next().show();
                    $.get('/home/cartajax/'+gid,{},function(data){
                        // console.log(data);
                })
            })
        })

                var dia = `<div class="shop-cartbasket-tablerow ng-scope dia" style="line-height:45px;">
                                <input class="mine itemname" name="gname[]"  value ="">
                                <input type="hidden" class="itegid" name="gid[]"  value ="">
                                <input class="your count" name="num[]" value="">
                                
                                 <input class="her price" name ="price[]" value="">元
                            </div>`;

                function only(){            
                    $('button[name=jia]').one("click",function(){
                        $('#shopcart').after(dia);
                        var t = $('#shopbasket').position().top; 
                        t = t - 43;
                        var p = 'top:'+t+'px;'+'height:auto;'
                        $('#shopbasket').attr('style',p);
                         var yy =$(this).siblings().eq(1).val();
                         // console.log(yy);
                    });     
                }
                function onlys(){            
                    $('button[name=jia]').one("click",function(){
                        $('#shopcart').after(dia);
                        var t = $('#shopbasket').position().top; 
                        t = t + 43;
                        var p = 'top:'+t+'px;'+'height:auto;'
                        $('#shopbasket').attr('style',p);
                         var yy =$(this).siblings().eq(1).val();
                         // console.log(yy);
                    });     
                }
                only();

                function xx(){
                    $('#aaa').attr('style','display:none');
                }

                // var i = 0;
                // function aaa(){
                //     i++;
                //     var dd =  $('#btn-add').html();
                //     if(dd==0 ||dd==''){
                //         var p = 'top:-208px;height:auto';
                //     }else{
                //         p = 'top:-44px;height:auto;';
                //     }
                //         if(i%2==1){
                              
                //             $('#shopbasket').attr('style',p);
                         
                //         }else{
                //             $('#shopbasket').attr('style','top:0px;height:auto;');
                //             $('#aaa').attr('style','display:none');
                //         }
                //         $('.icon-cart-add').attr('title','添加购物车');  
                // }
 
            </script>


            <div class="ng-isolate-scope">

                    <div class="shop-cart">
                    <form action="/home/orderest/index/{{$mid}}" method="get">
                    <div class="shop-cartbasket" id="shopbasket" style="top: -44px; height: auto;">

                        <div shop-groupswitcher="" id="shopcart" class="ng-isolate-scope">
                           
                            <div class="shop-grouphead single" id="qwe">
                                
                                <a href="javascript:" class="icon-cart-add ng-scope" title="添加购物车"></a>

                                <div class="shop-groupguidetip ng-scope" id="aaa">
                                    可以添加多个购物车，便于商家分类打包哦
                                    <a class="icon-close" onclick="xx()">
                                    </a>
                                </div>

                                <div class="shop-grouphead-row" id="carthead">
                                    购物车
                                    <a href="javascript:void(0);" onclick="hhh()">

                                        [清空]
                                    </a>
                                </div>
                            </div>
                        </div>

                        

                        <div class="shop-cartbasket-empty ng-scope">
                            <div class="icon-cart">
                            </div>
                            <p>
                                购物车是空的，赶紧选购吧
                            </p>
                        </div>

                    </div>


                    <div class="shop-cartfooter">
                        <div>
                            <span class="icon-cart shop-carticon" id="mycart">
                                <span class="ng-binding ng-scope" id="btn-add"></span>
                            </span>

                            <div class="shop-cartfooter-text extras ng-binding">
                                配送费¥6
                            </div>
                        </div>
                        <button class="shop-cartfooter-checkout ng-binding disabled" disabled="disabled" id="jiesuan" onclick="jiesuan()">
                            结算
                        </button>
                    </div>

                    </form>
                    <div class="shop-carthelper-opener">
                    </div>

                    <div class="shop-carthelper ng-isolate-scope" id="shophelper">

                        <div class="shopcarhelper-title clearfix">
                            <span>
                                凑一凑
                            </span>
                            <em>
                                轻松凑满起送价
                            </em>
                            <a href="javascript:" ng-click="closeCartHelper()">
                                [ 关闭 ]
                            </a>
                        </div>
                        <div class="shopcarthelper-container ui-scrollbar-light">

                        </div>
                    </div>
                    <div class="shop-flyitem">
                    </div>
                </div>
           

            </div>
            <div class="dialog" role="dialog" dialog="ITEMINFO" style="display: none;">
                <div class="dialog-close icon-close">
                </div>
                <div class="dialog-content" ng-transclude="">
                    <div shop-iteminfo="" item-info="itemInfo" class="ng-scope ng-isolate-scope">
                        <div class="shop-iteminfo">
                            <div class="iteminfo-imagegroup">
                                <img class="mainimage" ng-src="" alt="的图片">
                                <div ng-show="imagesPath.length &gt; 1" class="ng-hide">
                                    <a href="javascript:" class="imagegroup-ctrl icon-profile-left-arrow">
                                    </a>
                                    <ul class="imagelist">
                                        <!-- ngRepeat: imagePath in imagesPath track by $index -->
                                    </ul>
                                    <a href="javascript:" ng-click="showImageNext(4)" class="imagegroup-ctrl icon-profile-right-arrow">
                                    </a>
                                </div>
                            </div>
                            <section class="iteminfo-info">
                                <h5 ng-bind="itemInfo.name" class="ng-binding">
                                </h5>
                                <p ng-show="!!itemInfo.description" class="description ng-binding ng-hide"
                                ng-bind="itemInfo.description">
                                </p>
                                <div class="iteminfo-cartitem">
                                    <div class="iteminfo-price">
                                        <span class="price">
                                            <span class="yen">
                                                ¥
                                            </span>
                                            <span class="price ng-binding">
                                            </span>
                                        </span>
                                    </div>
                                    <!-- ngIf: itemInfo.name -->
                                </div>
                                <div class="iteminfo-rate">
                                    <!-- ngIf: ratingCount -->
                                    <ul class="rategroup">
                                        <!-- ngRepeat: item in ratePageContext.pageData -->
                                    </ul>
                                    <div class=" pagination">
                                        <ul>
                                        </ul>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="shopmain-right ng-isolate-scope" shop-bulletin="" data="shop">
        <div class="shopbulletin">
            <div class="shopbulletin-section">
                <h3 class="shopbulletin-section-title">
                    商家公告
                </h3>
                <p class="shopbulletin-content ng-binding">
                   {{$merchant->details}}
                </p>
                <div class="shopbulletin-delivery">
                    <h4>
                        配送说明：
                    </h4>
                    <p class="ng-binding">
                        配送费¥6
                    </p>
                </div>
                <ul class="shopbulletin-supports">
                    <!-- ngRepeat: support in shop.supports -->
                    @if($merchant->bill==1)
                    <li ng-repeat="support in shop.supports" class="ng-binding ng-scope">
                        <span class="ng-binding" style="background-color: rgb(153, 153, 153);">
                            票
                        </span>
                        该商家支持开发票，请在下单时填写好发票抬头
                    </li>
                    @endif
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
    <a href="http://kaidian.ele.me" class="sidetools-item icon-visit-history"
    target="_blank" id="one">
    </a>
    <div class="sidetools-item icon-qrcode">
        <img class="sidetools-qrcode" src="/home/images/app.png"
        alt="扫描二维码免费下载手机App">
    </div>
    <a href="JavaScript:" class="sidetools-item icon-arrow-up" id="two" 
    tooltip="回到顶部">
    </a>
    <div class="tooltip tooltip-placeleft" id="dian" style="display:none;">

        <div class="tooltip-arrow">
        </div>
        <div class="tooltip-content">
            我要开店
        </div>
    </div>

</div>

@endsection


@section('js')


    <script>
       

      

        $('#one').hover(function(){

            $('#dian').attr('style','display:block;left:-82px;top:4.5px;');
            $('.tooltip-content').text('我要开店');
        },function(){
             $('#dian').attr('style','display:none');
        });


        $('#two').hover(function(){
            $('#dian').attr('style','display:block;left:-82px;top:87.5px;');
            $('.tooltip-content').text('回到顶部');
            $(this).click(function(){
                $('body,html').animate({scrollTop:0},200);

            });                            
        },function(){
             $('#dian').attr('style','display:none');
        });

    </script>

    <script type="text/javascript">
        $('.enshrine').click(function(){
            $.get('/home/enshrineajax/'+{{$mid}},{},function(data){
                if(data=='1'){
                     $('.enshrine').text('取消收藏');
                     $('.xin').removeClass('icon-favorite');
                     $('.xin').addClass('icon-unfavorite');
                }else if(data == '0'){
                     $('.enshrine').text('收藏')
                    $('.xin').removeClass('icon-unfavorite');
                     $('.xin').addClass('icon-favorite');
                }else{
                    console.log('失败');
                }
            })
        })
    </script>
@endsection