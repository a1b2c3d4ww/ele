@extends('layout.home')

@section('title','购物车')

@section('content')
<div style="width:100%;height:10px"></div>
<div class="ng-scope">
    <div class="profile-container container">
        @include('layout.list')
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
            <div class="profile-panelcontent">
                <table class="order-list ng-scope" ng - show="orderList.length">
                    <thead style="text-align:center;">
                        <tr>
                            <th>
                                菜品
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
                            <tr class="timeline">
                                <input type="hidden" name="gid[]" readonly value="{{$v['gid']}}">
                                <td>
                                   
                                    <input type="" style="border:0px;text-align:center;" name="gname[]" readonly value="{{$v['gname']}}">
                                  
                                </td>
                                <td>
                                   
                                    <input type="" style="border:0px;text-align:center;" name="num[]" readonly value="{{$v['num']}}">
                               
                                </td>
                                <td>
                                  
                                    <input type="" style="border:0px;text-align:center;" name="price[]" readonly value="{{$v['price']}}">
 
                                </td>
                                
                                <td class="ordertimeline - handle ">
                                    <a onclick="return confirm('你确定要删除吗?')" class="ordertimeline - handle - detail " href="/home/mycarts/del/{{$k}}">
                                        删除
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            <div style="line-height:30px">
                                <!-- <div> -->
                                    共
                                    <span class="color-stress ng-binding" ng-bind="pieces">
                                        {{Session::get('orders.cnt')}}
                                    </span>
                                    份，总计
                                    <span class="color-stress ng-binding" ng-bind="total">
                                        {{Session::get('orders.sum')}}
                                    </span>
                                <button class="sidebarcart-submit ng-binding" style="float:right;border-radius:4px;">
                                    去结算
                                </button>
                                <!-- </div> -->
                            </div>
                        </form>
                        @endif
                        <!-- end ngRepeat: item in orderList -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


