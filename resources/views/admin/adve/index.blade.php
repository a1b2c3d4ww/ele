
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
               <form action="/admin/adver" method='get'>
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
                                style="width: 191px;">
                                链接
                                </th>
                                <th


                                style="width: 300px;">


                                 图片
                                </th>
                                <th 
                                style="width: 123px;">
                                  排序
                                </th>
                                   <th 
                                style="width: 123px;">
                                  状态
                                </th>
                     
                                  <th 
                                style="width: 123px;">
                                  操作
                                </th>
                     
                            </tr>
                        </thead>
                        <tbody role="alert" aria-live="polite" aria-relevant="all">
                             @foreach($res as $k => $v)
                            <tr align="center" class="

                    @if($k % 2 == 1) 
                        odd 
                    @else
                        even
                    @endif ">
                                <td class="">
                                  {{$v->lid}}
                                </td>
                                <td class="lname">
                                  {{$v->lname}}
                                </td>
                                
                             <td class=" "><img src="{{$v->lpic}}" alt="" style="width: 200px;height:30px"></td>
                           
                                <td class=" ">
                                {{$v->sort}}
                                </td>
                                <td class=" ">
                                      @if($v->status == 1)
                                          启用
                                        @else
                                           禁用
                                        @endif
                               </td>

                                 <td class=" ">
                       <span class="btn-group">
                                            @if($v->status == 1)
                                             <a href="/admin/up/{{$v->lid}}" class="btn btn-small"><i class="icon-minus-sign"></i></a>
                                            @else
                                               <a href="/admin/down/{{$v->lid}}" class="btn btn-small"><i class="icon-ok-sign"></i></a>
                                            @endif

                                              
                                            
                                            <a href="/admin/adver/{{$v->lid}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                                           <form action="/admin/adver/{{$v->lid}}" method='post' style='display:inline'>
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

@section('js')
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    //修改用户名
    $('.lname').dblclick(function(){
        //获取中间的文本
        var um = $(this).text().trim();

        //创建input
        var ipn = $('<input type="text" />');
        //
        $(this).empty();
        $(this).append(ipn);

        ipn.val(um);

        ipn.focus();

        ipn.select();

        var td = $(this);

        ipn.blur(function(){

            //获取id
            var lid = $(this).parents('tr').find('td').eq(0).text();

            //获取输入的值
            var lname = ipn.val();

            //发送ajax
            $.post('/admin/adverajax',{lid:lid,lname:lname},function(data){


                if(data == '1'){

                    //把td 中间的文本换成输入的值


                    td.text(lname);
                } else {

                    td.text(um);
                }

            })



        })



    })



</script>


@endsection


