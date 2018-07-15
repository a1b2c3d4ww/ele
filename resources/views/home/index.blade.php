
@extends('layout.home')

@section('title','饿了么-网上订餐')

@section('content')
    
    <style>
        #all{position:relative;
            height:200px;}
        #uls li{
            position:absolute;}

        #ids{
            border-radius: 10px;
            position: absolute;
            bottom: 15px;
            height: 13px;
            text-align: center;
            font-size: 0;
            left: 50%;
            margin-left: -39px;}

        #ids li{
        padding-top: 8px;
        width: 8px;
        height: 0;
        border-radius: 50%;
        background: #fff;
        cursor: pointer;
        display: inline-block;
        margin: 3px;}

        #ids .cur{background: #ff5000 none repeat scroll 0 0;}
    </style>

    <div style="width:100%;height:3px"></div>
    <div class="container ng-scope" id="all">
        <ul id='uls'>
            @foreach($adver as $k=>$v)
            <li><a href="{{$v->lname}}"><img src="{{$v->lpic}}" width="100%" height="200px"></a></li>
            @endforeach
        </ul>
        <ul id='ids'>
            @for($i=0;$i<$count;$i++)
            <li></li>
            @endfor
        </ul>
    </div>
    <div style="width:1200px;height:5px"></div>
    <div class="container ng-scope" style="top:500px;">
        <div class="excavator container">
            <!-- ngIf: rstCategories.length -->
            <div class="excavator-filter ng-scope" ng-if="rstCategories.length">
                <span class="excavator-filter-name">
                    商家分类:
                </span>
                 <li class="excavator-filter-item ng-binding ng-scope active list" value="0" style="cursor:pointer;font-size:15px;color:#666;">
                    全部商家
                </li>
                @foreach($data as $k=>$v)
                <!-- ngRepeat: category in rstCategories -->
                <li class="excavator-filter-item ng-binding ng-scope  parent list" style="cursor:pointer;font-size:15px;color:#666;line-height:30px"  value="{{$v['cid']}}">{{$v['cname']}}</li>
                  
                @endforeach
                
                  <br><br>
                   <div ng-show="subCategories" class="excavator-filter-subbox ng-hide " id="child">
                  
                     </div>
                <script>
                    var m = 1;
                    var into = null;
                    function move(){
                        //定时器
                    into = setInterval(function(){
                        show(m++);
                        if(m > 5){
                            m = 0;
                            }
                            },4000)
                        }
                        move();

                    //首先让第一张图片显示出来
                    function show(i){
                        //显示图片
                        $('#uls li').eq(i).fadeIn(800);
                        $('#uls li').eq(i).siblings().fadeOut(800);
                        //点的效果
                        $('#ids li').eq(i).addClass('cur');
                        $('#ids li').eq(i).siblings().removeClass('cur');
                    }
                    show(0);

                    $('#ids li').hover(function(){
                        //获取图片的索引
                        m = $(this).index();
                        
                        //让图片显示出来
                        show(m++);
                        //停止定时器
                        clearInterval(into);

                    },function(){
                        move();
                        if(m > 5){
                            m = 0;
                        }

                    })
                </script>
               
            </div>
        </div>

        <div class="place-rstbox clearfix">
            <div class="place-rstbox clearfix">
           
    <div class="clearfix liebiaos" style="height:500px;">
    @foreach($merchants as $k=>$v)  

        @if($v->status=='0')
        <a href="#" target=""
        class="rstblock-closed rstblock">
        @else
          <a href="/home/merchant/index/{{$v->mid}}" target="_blank"

        class="rstblock">
        @endif
            <div class="rstblock-logo">
                <img src="{{$v->mpic}}"
                width="70" height="70" alt="" class="rstblock-logo-icon">
            </div>
            <div class="rstblock-content">
                <div class="rstblock-title">
                    {{$v->mname}}
                </div>
                <div class="starrating icon-star">
                    @if($v->level==0)
                    <span class="icon-star" style="width:0%;">
                    @endif
                    @if($v->level==1)
                    <span class="icon-star" style="width:20%;">
                    @endif
                    @if($v->level==2)
                    <span class="icon-star" style="width:40%;;">
                    @endif
                     @if($v->level==3)
                    <span class="icon-star" style="width:60%;">
                    @endif
                     @if($v->level==4)
                    <span class="icon-star" style="width:80%;">
                    @endif
                     @if($v->level==5)
                    <span class="icon-star" style="width:100%;">
                    @endif
                    </span>
                </div>
                <div class="rstblock-cost">
                    配送费¥6
                </div>
               <div class="rstblock-activity">
                    @if($v->status==1)
                    <i style="background:#E75959;">新</i>
                    @endif
                    @if($v->safe==1)
                    <i style="background:#fff;color:#999999;border:1px solid;padding:0;">保</i>
                    @endif
                    @if($v->bill==1)
                    <i style="background:#fff;color:#999999;border:1px solid;padding:0;">票</i>
                    @endif
                </div>
                 @if($v->status=='0')
                <div class="rstblock-relaxing" style="margin-top:2px;">商家休息,暂不接单</div>
                @endif
            </div>
        </a>
            @endforeach
    </div>


<div class="clearfix liebiao" style="height:200px;">
            
        </div>
    </div>
</div>


@endsection


@section('js')

    <script >

        var g ;    

         var list;
   
        $('.parent').each(function(){
            $(this).click(function(){
                    $('.liebiaos').hide();
                    k = $(this).val()
                    console.log(k);
                $.ajax({
                url:'/home/firstajax/'+k,
                data:'',
                type:'GET',
                success:function(data){

                      g = data;
                      $('#child').text('');
                $('#child').removeClass('ng-hide');
                var sub = g.sub;
                console.log(g);
                for (var i in sub) {
                    // console.log(sub[i].cname);
                    var lis = $('<li class="excavator-filter-item ng-binding ng-scope active childlist" value="" style="cursor:pointer;"></li>');                    
                    $('#child').append(lis.text(sub[i].cname));
                    $('#child').append(lis.val(sub[i].cid));

                }

                 $('.childlist').each(function(){
            // console.log($(this));
            $(this).click(function(){
                l = $(this).val();
                // console.log('111');
                      $.ajax({
                url:'/home/listajax/'+l,
                type:'GET',
                success:function(data){
                      // console.log(data);
                    for (var i = 0; i < data.length; i++) {
                        
                       
                        list = $('.liebiao');
                        if(data[i].status==0){
                              var a = $('<a href="#" class="rstblock-closed rstblock  " name="right"></a>');
                              var div7 = $('<div class="rstblock-relaxing">商家休息,暂不接单</div>');

                        }else{
                               var a = $('<a href="#" class="rstblock " name="right"></a>');
                              a.attr('href','/home/merchant/index/'+data[i].mid);

                        }
                      

                        var div1 =$(' <div class="rstblock-logo"></div>');
                        var img = $('<img src="" width="70" height="70"  class="rstblock-logo-icon">');
                        img.attr('src',data[i].mpic);
                        var div2 = $('<div class="rstblock-content"></div>');
                        var div3 = $('<div class="rstblock-title"></div>');
                        var div4 = $(`<div class="starrating icon-star"><span class="icon-star" style="width:82%;">
                                </span>
                            </div>`);
                        var div5 = $('<div class="rstblock-cost">配送费¥6</div>');
                        var div6 = $(` <div class="rstblock-activity">
                               
                               
                                
                            </div>`);
                        div3.text(data[i].mname);
                        div2.append(div3);
                        div2.append(div4);
                        div2.append(div5);
                        div2.append(div6);
                        if(data[i].status==0){
                             div2.append(div7);
                        }
                       
                        if(data[i].status==1){
                            div6.append(`<i style="background:#E75959;">
                                    新
                                </i>`)
                        }
                        if(data[i].safe==1){
                            div6.append(` <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    保
                                </i>`)
                        }
                        if(data[i].bill==1){
                            div6.append(` <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>`)
                        }
                        div1.append(img);
                        a.append(div1);
                        a.append(div2);
                        list.append(a);
                    }
            
                },
                error:function(){

                    console.log('发送失败');
                },
                timeout:1000,      
                async: true

            })

                 $('.liebiao').text('');  
                
            })
           
         })  
                },
                error:function(){

                    console.log('发送失败');
                },
                timeout:1000,      
                async: true

            })

            })

        })
      
         $('.list').each(function(){
            // console.log($(this));
            $(this).click(function(){
                l = $(this).val();
                // console.log('111');
                      $.ajax({
                url:'/home/listajax/'+l,
                type:'GET',
                success:function(data){
                      // console.log(data);
                    for (var i = 0; i < data.length; i++) {
                        
                       
                        list = $('.liebiao');
                        if(data[i].status==0){
                              var a = $('<a href="#" class="rstblock-closed rstblock ajaxs" name="right"></a>');
                              var div7 = $('<div class="rstblock-relaxing">商家休息,暂不接单</div>');

                        }else{
                               var a = $('<a href="#" class="rstblock" name="right"></a>');
                              a.attr('href','/home/merchant/index/'+data[i].mid);

                        }
                      

                        var div1 =$(' <div class="rstblock-logo"></div>');
                        var img = $('<img src="" width="70" height="70"  class="rstblock-logo-icon">');
                        img.attr('src',data[i].mpic);
                        var div2 = $('<div class="rstblock-content"></div>');
                        var div3 = $('<div class="rstblock-title"></div>');
                        var div4 = $(`<div class="starrating icon-star"><span class="icon-star" style="width:82%;">
                                </span>
                            </div>`);
                        var div5 = $('<div class="rstblock-cost">配送费¥6</div>');
                        var div6 = $(` <div class="rstblock-activity">
                               
                               
                                
                            </div>`);
                        div3.text(data[i].mname);
                        div2.append(div3);
                        div2.append(div4);
                        div2.append(div5);
                        div2.append(div6);
                        if(data[i].status==0){
                             div2.append(div7);
                        }
                       
                        if(data[i].status==1){
                            div6.append(`<i style="background:#E75959;">
                                    新
                                </i>`)
                        }
                        if(data[i].safe==1){
                            div6.append(` <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    保
                                </i>`)
                        }
                        if(data[i].bill==1){
                            div6.append(` <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                    票
                                </i>`)
                        }
                        div1.append(img);
                        a.append(div1);
                        a.append(div2);
                        list.append(a);
                    }
            
                },
                error:function(){

                    console.log('发送失败');
                },
                timeout:1000,      
                async: true

            })
                 $('.liebiao').text('');   
                  
            })
           
         })  
         
          </script>
    

    <script>
        var dvs = $('<div class="rstpopover placeright" name="hright"></div>');
        var dvs1 = $('<div class="rstpopover-arrow"></div>');
        dvs.append(dvs1);
        var dvs2 = $('<div class="rstpopover-title"></div>');
        dvs.append(dvs2);
        var dvs3 = $('<div class="rstpopover-flavors"></div>');
        dvs.append(dvs3);
        var ul1 = $('<ul class="rstpopover-activities"></ul>');
        dvs.append(ul1);
        var ul2 = $('<ul class="rstpopover-delivery"></div>');
        var li4 =$('<li>配送费¥6</li>');
        ul2.append(li4);
        var li5 = $('<li>平均<span class="color-stress plrtiny">30</span>分钟送达</li>');
        ul2.append(li5);
        dvs.append(ul2);
        var dvs4 = $('<div class="rstpopover-notice"></div>');

        
        $('.rstblock').hover(function(){
            var aa = $(this).attr('href');
            var mid = aa.substring(21);

                $.ajax({
                    url:'/home/firstlist',
                    data:'mid='+mid,
                    type:'GET',
                    success:function(data){

                    dvs2.text(data.mname);
                    dvs3.text(data.details);

                    if(data.status==1){
                        var li1 = $('<li></li>');
                        li1.append(`<i style="background:#E75959;">
                                新
                            </i>新店开张，欢迎光临`);
                        ul1.append(li1);
                    }
                    if(data.safe==1){
                        var li2 = $('<li></li>');
                        li2.append(` <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                保
                            </i>该商户食品安全已由中国太平洋保险承保，食品安全有保障`);
                        ul1.append(li2);
                    }
                    if(data.bill==1){
                        var li3 = $('<li></li>');
                        li3.append(` <i style="background:#fff;color:#999999;border:1px solid;padding:0;">
                                票
                            </i>该商家支持开发票，请在下单时填好发票开头`);
                        ul1.append(li3);
                    }

                },
                    error:function(data){
                        console.log('发送失败');
                    },
                    timeout:3000,
                    async:false
            })
        
            if(mid!=''){
                $(this).after(dvs);

            }
            
            // 获取.rstblock的左侧偏移量和宽
            var l = $(this).offset().left; 
            var w = $(this).width(); 
            // 求出div[name=hright]的左侧偏移量
            var hl = w + l - 24;

            if(hl > 1100){
                hl = 580;
                $('div[name=hright]').removeClass('placeright');
                $('div[name=hright]').addClass('placeleft');
            }else{
                $('div[name=hright]').removeClass('placeleft');
                $('div[name=hright]').addClass('placeright');
            }

            // 获取.rstblock的顶部偏移量
            var t = $(this).offset().top; 
            var h = $(this).height();

            // 求出div[name=hright]的顶部偏移量
            var aa = $('.rstblock').eq(0).offset().top;
            var ht = t - aa + 1;

            var b = 'display:block;'+'left:'+hl+'px'+';'+'top:'+ht+'px';
            $('div[name=hright]').attr('style',b);

        },function(){
            dvs.remove();
            ul1.empty();
            $('div[name=hright]').attr('style','display:none');
        });

    </script>
   

@endsection