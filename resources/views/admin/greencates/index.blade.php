@extends('layout.admin')

@section('title','商家分类列表')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
           商家分类列表
        </span>
    </div>
    @if(session('msg'))
    <div class="mws-form-message error">
        <ul>
            <li style="list-style: none;">{{session('msg')}}</li>
        </ul>
        
    </div>

    @endif
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            <form action="/admin/greencate/index" method="get">
            <div id="DataTables_Table_1_length" class="dataTables_length">
                <label>
                    显示
                    <select size="1" name="num" aria-controls="DataTables_Table_1">

                        <option value="5"  @if($num=='5') selected @endif>
                            5
                        </option>
                        <option value="10"@if($num=='10') selected @endif>
                            10
                        </option>
                        <option value="50"@if($num=='50') selected @endif>
                            50
                        </option>
                        <option value="100"@if($num=='100') selected @endif>
                            100
                        </option>
                    </select>
                    条
                </label>
            </div>
            <div class="dataTables_filter" id="DataTables_Table_1_filter">
                <label>
                    Search:
                    <input type="text" placeholder="分类名" name="catesearch" aria-controls="DataTables_Table_1" value="{{$catesearch}}">
                    <input type="text" placeholder="商家名" name="namesearch" aria-controls="DataTables_Table_1" value="{{$namesearch}}">
                    <button class="btn btn-info">搜索</button>
                </label>
            </div>
            </form>
            <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1"
            aria-describedby="DataTables_Table_1_info">
                <thead>
                    <tr role="row">
                        <th 
                        style="width: 143px;">
                            id
                        </th>
                        <th 
                        style="width: 190px;">
                            分类名称
                        </th>
                        <th 
                        style="width: 174px;">
                           商家名称
                        </th>
                        <th 
                        style="width: 90px;">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($res as $k=>$v)
                    <tr  class=" @if($k % 2 == 1) 
                        odd 
                    @else
                        even
                    @endif 
">
                        <td align="center" class="">
                            {{$v->fid}}
                        </td>
                        <td align="center">{{$v->fname}}</td>
                        <td align="center" class="">
                            {{getmName($v->mid)}}

                        </td>
                      
                        <td align="center" class=" ">
                                 @if(Session::get('adminUser')->auth=='1')
                             <span class="btn-group">  
                                <a href="/admin/green/{{$v->mid}}/{{$v->fid}}" class="btn btn-small"><i class="icon-indent-left"></i></a>                      
                                <a href="/admin/greencate/edit/{{$v->fid}}" class="btn btn-small"><i class="icon-pencil"></i></a>
                                <a href="/admin/greencate/delete/{{$v->fid}}" class="btn btn-small"><i class="icon-trash" onclick="return confirm('你确定要删除吗?')"></i></a>
                         
                             </span>
                                @endif
                        </td>
                    </tr>
                   @endforeach
                    </tbody></table><div class="dataTables_info" id="DataTables_Table_1_info">当前{{$num}}条,共{{$count}}条</div>
                </tbody>
            </table>
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
            <div class="dataTables_paginate paging_full_numbers " style="display: inline-block;" id="DataTables_Table_1_paginate">
          {{$res->appends(['num'=>$num,'catesearch'=>$catesearch,'namesearch'=>$namesearch])->links()}}
            </div>
        </div>
    </div>
</div>
@endsection


  