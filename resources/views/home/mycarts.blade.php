@extends('layout.home')

@section('title','我的购物车')

@section('list')


        <div class="profile-panel" role="main">
            <!-- ngIf: pageTitleVisible -->
            <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
                <span ng-bind="pageTitle" class="ng-binding">
                    购物车
                </span>
                <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
                </span>
            </h3>
            <!-- end ngIf: pageTitleVisible -->
            <div class="profile-panelcontent" ng-transclude="">
                <div class="order-fetchtakeout ng-scope ng-isolate-scope" show-fetch-takeout-dialog="">
                    <img src="/home/images/takeout.408a87.png">
                </div>
<table class="order-list ng-scope" ng - show="orderList.length">
    <thead>
        <tr>
            <th >
                菜品
            </th>
            <th>
            </th>
            <th>
                数量
            </th>
            <th>
                小计
            </th>
            <th>
                操作
            </th>
        </tr>
    </thead>

    <tbody>
      
      
        <!-- ngRepeat: item in orderList -->
        @if(Session::get('carts'))
        <form action="/home/orderest/index/{{Session::get('orders.cnt')}}">
        @foreach(Session::get('carts') as $k=>$v)

<tr class="timeline" order-timeline="" ng-repeat="item in orderList">
             <input type="hidden"  name="gid[]" readonly value="{{$v['gid']}}">
               <td >
                <h3 >
                <input type="" style="border: 0px;" name="gname[]" readonly value="{{$v['gname']}}">
                </h3>
            </td>
            <td>
                <h3 >
                     <input type="" style="border: 0px;" name="num[]" readonly  value="{{$v['num']}}">
                </h3>
            </td>
      
            <td >
                <h3 >
                    <input type="" style="border: 0px;" name="price[]" readonly value="{{$v['price']}}">          
                </h3>
            </td>
            <td class="ordertimeline - status ">
                <h3 ng-bind="item.statusText " ng-class=" {
                'waitpay': (item.realStatus === 1),
                'end': (item.realStatus === 5)
                }
                " class="ng - binding end ">
                                     
                </h3>
                <!-- ngIf: statusText -->
            </td>
            <td class="ordertimeline - handle ">
                <a onclick="return confirm('你确定要删除吗?')" class="ordertimeline - handle - detail " ng-href="order / id / 1219646428822216768 "
                href="/home/mycarts/del/{{$k}}">
                    删除
                </a>
                <!-- ngIf: item.realStatus===1 -->
                <!-- ngIf: item.realStatus===2 -->
                <!-- ngIf: item.realStatus===3 -->
                <!-- ngIf: item.realStatus===4 -->
                <!-- ngIf: item.realStatus===5 -->
                <!-- end ngIf: item.realStatus===5 -->
                <!-- ngIf: item.realStatus===6 -->
            </td>

        </tr>
        @endforeach
        
 
       <div  ng-show="pieces">
            <p>
                共
                <span class="color-stress ng-binding" ng-bind="pieces">
                    {{Session::get('orders.cnt')}}
                </span>
                份，总计
                <span class="color-stress ng-binding" ng-bind="total">
                    {{Session::get('orders.sum')}}
                </span>
            </p>
            <button ng-click="settle()" class="sidebarcart-submit ng-binding" ng-class="{ 'sidebarcart-hasagio': submitButton.disabled }"
            ng-bind="submitButton.text" ubt-click="391">
                去结算
            </button>
        </div>
        </form>
        @endif
        <!-- end ngRepeat: item in orderList -->
    </tbody>

</table>
@endsection


