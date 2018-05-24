@extends('layout.admin')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title',$title)

@section('content')
<div class="container">
    
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>
                <i class="icon-table">
                </i>
            {{$title}}
            </span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
               <form action="/admin/orders" method='get'>
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <label>
                        显示
                        <select size="1" name="num" aria-controls="DataTables_Table_1" >
                            <option value="10" @if($num == 10) selected="selected" @endif>
                                10
                            </option>
                             <option value="20" @if($num == 20) selected="selected" @endif>
                                20
                            </option>
                             <option value="30" @if($num == 30) selected="selected" @endif>
                                30
                            </option>
                            
                            
                        </select>
                        条

                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        关键字
                        <input type="text" name='search' aria-controls="DataTables_Table_1" value="{{$search}}">
                    </label>

                <button class='btn btn-info'>搜索</button>
                </div>
                </form>
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
                aria-describedby="DataTables_Table_1_info">
                    <thead>
                        <tr role="row">
                            <th 
                            style="">
                                订单号
                            </th>
                         
                            <th 
                            style="">
                                联系人
                            </th>
                            <th 
                            style="">
                                地址
                            </th>
                            <th 
                            style="">
                               电话
                            </th>
                         
                             <th>
                                购买时间
                            </th>
                             <th>
                                总金额
                            </th>
                             <th>
                                状态
                            </th>
                             <th>
                                 留言
                            </th>
                             <th>
                                菜品总数
                            </th>
                             <th>
                                操作
                            </th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                            @foreach($res as $k => $v)
                        <tr  align="center" class="
                    @if($k % 2 == 1) 
                        odd 
                    @else
                        even
                    @endif ">

                            <td class="">
                               {{$v->oid}}
                            </td>
                          
                            <td class=" ">
                                {{getuName($v->uid)->uname}}
                            </td>
                            <td class=" ">
                               {{getuName($v->uid)->addr}}
                            </td>
                            <td class=" ">
                            {{getuName($v->uid)->tel}}
                            </td>
                      
                            <td class=" ">
                              {{$v->otime}}
                            </td>
                            <td class=" ">
                             {{$v->sum}}
                            </td>
                            <td class=" ">
                                @if($v->status == 0)
                                          新订单
                                        @elseif($v->status == 1)
                                           已发货
                                        @elseif($v->status == 2)
                                        已收货
                                        @else
                                        无效订单
                                        @endif
    

                            </td>       
                               <td class=" ">
                           {{$v->details}}
                            </td>
                            <td class=" ">
                             {{$v->cnt}}
                            </td>
                                <td class=" ">
                       <span class="btn-group">
                                          
                                            <a href="/admin/read/{{$v->oid}}" class="btn btn-small"><i class="icon-list-2"></i></a>

                                             <a href="/admin/orders/{{$v->oid}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                                           <form action="/admin/orders/{{$v->oid}}" method='post' style='display:inline'>
                            {{csrf_field()}}

                            {{method_field('DELETE')}}

                            <button class="btn btn-small" onclick="return confirm('你确定要删除吗?')"><i class="icon-trash"></i></button>

                        </form>
                                        </span>

                    </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="dataTables_info" id="DataTables_Table_1_info">
                   共{{$count}}条
                </div>
                <style>
                    .pagination li{
                        float: left;
                        height: 20px;
                        padding: 0 10px;
                        display: block;
                        font-size: 12px;
                        line-height: 20px;
                        text-align: center;
                        cursor: pointer;
                        outline: none;
                        background-color: #444444;
                       
                        text-decoration: none;
                        border-right: 1px solid #232323;
                        border-left: 1px solid #666666;
                        border-right: 1px solid rgba(0, 0, 0, 0.5);
                        border-left: 1px solid rgba(255, 255, 255, 0.15);
                        -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                        -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                        box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);

                    }

                    .pagination li a{
                    color: #fff;
                    }

                    .pagination .active{
                    background-color: #88a9eb;
                    color: #323232;
                    border: none;
                    background-image: none;
                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                    }

                    .pagination .disabled{

                        color: #666666;
                        cursor: default;
                    }

                    

                    .pagination{
                        margin:0px;
                    }
                
                </style>

               <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
                {{ $res->appends($request)->links() }}




               </div>
    </div>
</div>

@endsection