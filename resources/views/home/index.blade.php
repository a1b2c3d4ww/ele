@extends('layout.home')

@section('title','饿了么-网上订餐')

@section('content')

 <div ng-view="" role="main" class="ng-scope">
    <div class="container clearfix ng-scope">
        <!-- ngIf: isBeijing -->
      
        <!-- end ngIf: isBeijing -->
       
        <div class="place-search" role="search" search-input="">
            <a class="place-search-btn icon-search" ubt-click="403" 
            title="搜索商家或美食" ubt-data-keyword="">
            </a>
            <label for="globalsearch">
                搜索商家或美食
            </label>
            <input id="globalsearch" class="place-search-input ng-pristine ng-valid"
            ng-model="searchText" autocomplete="" placeholder="搜索商家,美食...">
            <div class="searchbox">
                <div class="searchbox-list searchbox-rstlist ng-hide">
                    <ul>
                        <!-- ngRepeat: restaurant in searchRestaurants | orderBy: [ '-is_opening',
                        'order_lead_time' ] | limitTo: 5 -->
                    </ul>
                </div>
                <div class="searchbox-list searchbox-foodlist ng-hide">
                    <ul>
                        <!-- ngRepeat: food in searchFoods | limitTo: 5 -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- ngIf: activities -->
    <div class="place-tab clearfix container ng-scope">
        <div class="place-fetchtakeout ng-isolate-scope" show-fetch-takeout-dialog="">
            <img src="/home/images/takeout.408a87.png" alt="谁去拿外卖">
        </div>
    </div>
    <div ng-show="!recentBoughtOnly" class="container ng-scope">
        <div class="excavator container">
            <!-- ngIf: rstCategories.length -->
            <div class="excavator-filter ng-scope" ng-if="rstCategories.length">
                <span class="excavator-filter-name">
                    商家分类:
                </span>
                 <li class="excavator-filter-item ng-binding ng-scope active list" value="0" style="cursor:pointer;">
                    全部商家
                </li>
                @foreach($data as $k=>$v)
                <!-- ngRepeat: category in rstCategories -->
                <li class="excavator-filter-item ng-binding ng-scope active parent list" style="cursor:pointer;"  value="{{$v['cid']}}">{{$v['cname']}}</li>
                  
                @endforeach
                
                  <br><br>
                   <div ng-show="subCategories" class="excavator-filter-subbox ng-hide" id="child">
                  
                     </div>
               
              
                <!-- end ngRepeat: category in rstCategories -->
               
                    <!-- ngRepeat: subitem in subCategories -->
               
            </div>
            <!-- end ngIf: rstCategories.length -->
        </div>

        <div class="place-rstbox clearfix">
            <div class="place-rstbox clearfix">
           
    <div class="clearfix liebiaos" data="filteredRestaurants = (rstStream.restaurants | filter: rstStream.filter | filter: otherFilter | orderBy: [ '-is_opening', rstStream.orderBy || 'index' ])"
    style="height: 1680px;">
    @foreach($merchants as $k=>$v)  
        <a href="/home/merchant/index/{{$v->mid}}" data-rst-id="221683" data-bidding="" target="_blank"
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
                    配送费¥5
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