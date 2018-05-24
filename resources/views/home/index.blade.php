
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
            <li><img src="{{$v->lpic}}" width="100%" height="200px"></li>
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
                   <div ng-show="subCategories" class="excavator-filter-subbox ng-hide" id="child">
                  
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
        <a href="/home/merchant/index/{{$v->mid}}" target="_blank"

        class="rstblock">
            <div class="rstblock-logo">
                <img src="{{$v->mpic}}"
                width="70" height="70" alt="必胜客（回龙观店）" class="rstblock-logo-icon">
            </div>
            <div class="rstblock-content">
                <div class="rstblock-title">
                    {{$v->mname}}
                </div>
                <div class="starrating icon-star">
                    <span class="icon-star" style="width:96%;">
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
            </div>
        </a>
            @endforeach
    </div>


<div class="clearfix liebiao" style="height: 840px;">
            

        </div>
    </div>
</div>




@endsection


@section('js')

    <script >
        // console.log($('.parent'));

        var g ;
       

        $('.parent').each(function(){
            $(this).click(function(){
                    $('.liebiaos').hide();
                    k = $(this).val()
                    // console.log(k);
                $.ajax({
                url:'/home/firstajax/'+k,
                data:'',
                type:'GET',
                success:function(data){

                      g = data;
                      $('#child').text('');
                $('#child').removeClass('ng-hide');
                var sub = g.sub;
                for (var i in sub) {
                    // console.log(sub[i].cname);
                    var lis = $('<li class="excavator-filter-item ng-binding ng-scope active" value="" style="cursor:pointer;"></li>');
                    
                    $('#child').append(lis.text(sub[i].cname));

                }
                },
                error:function(){

                    console.log('发送失败');
                },
                timeout:1000,      
                async: true

            })
              

            })

        })
       var list;
        $('.list').each(function(){
            $(this).click(function(){
                l = $(this).val();
                console.log(l);
                      $.ajax({
                url:'/home/listajax/'+l,
                data:'json',
                type:'GET',
                success:function(data){
                      console.log(data);
                    for (var i = 0; i < data.length; i++) {
                        
                       
                        list = $('.liebiao');
                        var a = $('<a href="" class="rstblock" name="right"></a>');
                        a.attr('href','/home/merchant/index/'+data[i].mid);
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
                        div2.text(data[i].mname);
                        div2.append(div3);
                        div2.append(div4);
                        div2.append(div5);
                        div2.append(div6);
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
        
        $('a[name=right]').hover(function(){
            // 获取a[name=right]的左侧偏移量和宽
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

            // 获取a[name=right]的顶部偏移量
            var t = $(this).offset().top; 
            var h = $(this).height();

            // 求出div[name=hright]的顶部偏移量
            var aa = $('a[name=right]').eq(0).offset().top;
            var ht = t - aa + 1;

            var b = 'display:block;'+'left:'+hl+'px'+';'+'top:'+ht+'px';
            $('div[name=hright]').attr('style',b);

        },function(){
            $('div[name=hright]').attr('style','display:none');
        });


    </script>
    

@endsection