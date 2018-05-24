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
                       
                        条

                    </label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>
                        关键字
                        <input type="text" name='search' aria-controls="DataTables_Table_1" value="">
                    </label>

                <button class='btn btn-info'>搜索</button>
                </div>
                </form>
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
                aria-describedby="DataTables_Table_1_info">
                    <thead>
                        <tr role="row">
                            <th 
                            style="width: 191px;">

                               ID

                            </th>

                             <th 
                            style="width: 191px;">

                                菜品图片

                            </th>
                            
                          
                            <th 
                            style="width: 174px;">
                               菜品名称
                            </th>
                           
                             <th 
                            style="width: 91px;">
                                 单价
                            </th>
                             <th 
                            style="width: 91px;">
                                数量
                            </th>
                           
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                            @foreach($res as $k => $v)
                        <tr  align="center" class="
                   ">
                                    
                          <td class=" ">
                               {{$v->did}}
                            </td> 
                            <td class=" ">
                              <img src="{{$v->gpic}}" alt="" width='100px'>
                            </td>
                            <td class=" ">
                             {{$v->gname}}
                            </td>
                            <td class=" ">
                            {{$v->price}}
                            </td>
                            <td class=" ">
                               {{$v->num}}
                            </td>
                        </tr>
                   @endforeach
                    </tbody>
                </table>
                <div class="dataTables_info" id="DataTables_Table_1_info">
                   
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
                
               




               </div>
    </div>
</div>

@endsection