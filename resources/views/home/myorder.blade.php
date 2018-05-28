@extends('layout.home')

@section('title','我的订单')

@section('content')
    <div style="width:100%;height:10px"></div>
    <div class="ng-scope">
    <div class="profile-container container">
        @include('layout.list')
        <div class="profile-panel">
    
            <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
                <span ng-bind="pageTitle" class="ng-binding">
                    近三个月订单
                </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                </span>
            </h3>
    
    <div class="profile-panelcontent" ng-transclude="">
        <div class="order-fetchtakeout ng-scope ng-isolate-scope" show-fetch-takeout-dialog="">
            <img src="/home/images/takeout.408a87.png">
        </div>
        <table class="order-list ng-scope" ng - show="orderList.length">
            <thead>
                <tr>
                    <th>
                        下单时间
                    </th>
                    <th class="order-list-infoth">
                        订单内容
                    </th>
                    <th>
                    </th>
                    <th>
                        支付金额（元）
                    </th>
                    <th>
                        状态
                    </th>
                    <th>
                        操作
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                </tr>
                @foreach($order as $k=>$v)
                <!-- ngRepeat: item in orderList -->
                <tr class="timeline" order-timeline="" ng-repeat="item in orderList">
                    
                    <td class="ordertimeline-time">
                        <p class="ng-binding">
                            {{date('Y-m-d H:i',$v->otime)}}
                        </p>

                        <i class="ordertimeline-time-icon icon-uniE65E finish ng-scope">
                        </i>
                        <!-- end ngIf: item.realStatus===5 -->
                    </td>

                    <td class="ordertimeline-avatar">
                        <a ng - href="/home/merchant/index/{{$v->mid}}" href="/shop/">
                            <img src="{{getmid($v->mid)->mpic}}">
                        </a>
                    </td>
                    <td class="ordertimeline-info">
                        <h3 class="ordertimeline-title">
                            <a ng - href="/shop/" ng - bind="item.restaurant.name" class="ng-binding"
                            href="/shop/">
                            </a>
                            <!-- ngIf: item.is_book -->
                        </h3>
                        <p class="ordertimeline-info-food">
                            <a ng - href="order/id/1219646428822216768" href="order/id/1219646428822216768">
                                @foreach(getdetails($v->oid) as $kk=>$vv)
                                <span class="ordertimeline-food ng-binding" ng - bind="item.product">
                                    {{$vv->gname}}
                                </span>
                                @endforeach
                                <span class="ordertimeline-info-productnum ng-binding" ng-bind="item.productnum">
                                    {{$kk+1}}
                                </span>
                                <span>
                                    个菜品
                                </span>
                            </a>
                        </p>
                        <p>
                            订单号:
                            <a ng-href="order/id / 1219646428822216768 " ng-bind="item.unique_id "
                            class="ng - binding " href="order / id / 1219646428822216768 ">
                                {{$v->oid}}
                            </a>
                        </p>
                    </td>
                    <td class="ordertimeline - amount ">
                        <h3 class="ordertimeline - title ordertimeline - price ui - arial ng - binding ">
                            {{$v->sum}}
                        </h3>
                    </td>
                    <td class="ordertimeline - status ">
                        <h3 class="ng - binding end ">
                           
                                        @if($v->status == 1)
                                           已下单
                                        @elseif($v->status == 0)
                                            无效订单
                                        @elseif($v->status == 3)
                                        <a href="/home/homedown/{{$v->oid}}">确认收货(配送中)</a>
                                         @elseif($v->status == 4)
                                            交易完成 
                                        
                                        @endif
                        </h3>
                        <!-- ngIf: statusText -->
                    </td>
                    <td class="ordertimeline - handle ">
                        <a class="ordertimeline - handle - detail " href="/home/orderdetails/{{$v->oid}}/{{$v->mid}}">
                            订单详情
                        </a><br><br>
                        @if($v->status==4)
                           <a class="ordertimeline - handle - detail " ng-href="order / id / 1219646428822216768 "
                        href="/home/homeorder/{{$v->oid}}"}">
                             <a href="javascript:" onclick="tan()">
                                        订单评价
                                    </a>
                        </a><br><br>
                        @endif
                          @if($v->status != 0)
                         <a class="ordertimeline - handle - detail " ng-href="order / id / 1219646428822216768 "
                        href="/home/homeorder/{{$v->oid}}"}">
                            取消订单</a>
                            @endif
                        
                      
                    </td>
                    <td>
<div class="addressdialog" id="haha"  style="display:none;">
    <div class="addressdialog-close" id="off" onclick="down()">
    </div>
    <div class="addressdialog-header">
       您的评价
    </div>
    <div class="addressdialog-content">

        <form action="/home/myreview" method ="get">  
        <div class="addressform">
            <div>

                <div class="addressformfield">
                    <label>
                        评分
                    </label>
                    <input type="hidden" name="mid" value="{{$v->mid}}">
                     <input type="hidden" name="uid" value="{{$v->uid}}">
                    <select name="level" style="width: 80px;">
                           <option value="5">5 分</option>
                           <option value="4">4 分</option>
                           <option value="3">3 分</option>
                           <option value="2">2 分</option>
                           <option value="1">1 分</option>
                      </select>
                    </div>
                </div>
                <div class="addressformfield phonefield">
                    <label>
                       评价
                    </label>
                    <textarea name="content" style="width: 200px;height: 100px;"></textarea>
                    <div class="addressformfield-hint">

                        <span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="addressform-buttons">
                <button onclick="down()">
                    保存
                </button>
                <button type="button" onclick="down()">
                    取消
                </button>
            </div>
        </div>
</div>
        </form>

    
            
        


                    </td>
                    
                </tr>
                
                @endforeach
                <div id="dvs" style="display:none;" onclick="down()"></div>
                    <script>
                    function tan(){
                        $('#haha').attr('style','display:block;z-index:1003;left:245px;top:100px;');
                        $('#dvs').attr('style','display:block;z-index:1002;position:fixed;left:0px;top:0px;width:100%;height:100%;opacity:0.5;background:rgb(0, 0, 0);');
                    }
                    
                    function down(){
                        $('#haha').attr('style','display:none;');
                        $('#dvs').attr('style','display:none;');
                        // $('#pingjia').attr('style','display:none;');
                    }


                </script>
    <script>
        $('#tan').click(function(){
        $('#haha').attr('style','display:block;z-index:1003;left:245px;top:80px;');
        $('#dvs').attr('style','display:block;z-index:1002;position:fixed;left:0px;top:0px;width:100%;height:100%;opacity:0.5;background:rgb(0, 0, 0);');
    });

        function down(){
        $('#haha').attr('style','display:none;');
        $('#dvs').attr('style','display:none;');
    }
    </script>



@endsection

