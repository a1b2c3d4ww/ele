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
               <form action="/admin/reviews" method='get'>
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
                            style="width: 142px;">
                                ID
                            </th>
                         
                            <th 
                            style="width: 174px;">
                               用户名称
                            </th>
                            <th 
                            style="width: 123px;">
                             商家名称
                            </th>
                            <th 
                            style="width: 91px;">
                                评论
                            </th>
                         
                             <th 
                            style="width: 91px;">
                             评分
                            </th>
                             <th 
                            style="width: 91px;">
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

                          
                            <td class=" ">
                            {{$v->rid}}
                            </td>
                            <td class=" ">
                            {{getuName($v->uid)->uname}}
                            </td>
                            <td class=" ">
                            {{getmName($v->mid)}}
                            </td>
                      
                            <td class=" ">
                            {{$v->content}}
                            </td>
                          
                            <td class=" ">
                                @if($v->level == 1)
                                一星
                              @elseif($v->level == 2)
                                二星
                             @elseif($v->level == 3)
                                三星
                             @elseif($v->level == 4)
                                四星
                            @elseif($v->level == 5 )
                                五星
                            @endif
    

                            </td>       
                        
                                <td class=" ">
                       <span class="btn-group">
                                          
                                        
                                           <form action="/admin/reviews/{{$v->rid}}" method='post' style='display:inline'>
                            {{csrf_field()}}

                            {{method_field('DELETE')}}

                            <button class="btn btn-small"><i class="icon-trash"></i></button>

                        </form>
                                        </span>

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
                {{ $res->appends($request)->links() }}




               </div>
    </div>
</div>

@endsection