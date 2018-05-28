
@extends('layout.admin')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title',$title)

@section('content')


 @if(session('msg'))
    <div class="mws-form-message error">
        <ul>
            <li style="list-style: none;">{{session('msg')}}</li>
        </ul>
        
    </div>

    @endif


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
               <form action="/admin/member" method='get'>
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
                            <th style="width: 154px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                               ID
                            </th>
                            <th  style="width: 209px;" aria-label="Browser: activate to sort column ascending">
                                账号
                            </th>
                            <th  style="width: 194px;" aria-label="Platform(s): activate to sort column ascending">
                                姓名
                            </th>
                            <th  style="width: 131px;" aria-label="Engine version: activate to sort column ascending">
                               性别
                            </th>
                            <th  style="width: 95px;" aria-label="CSS grade: activate to sort column ascending">
                              地址
                            </th>
                            <th  style="width: 95px;" aria-label="CSS grade: activate to sort column ascending">
                              年龄
                            </th>
                            <th  style="width: 95px;" aria-label="CSS grade: activate to sort column ascending">
                              电话
                            </th>
                            <th  style="width: 95px;" aria-label="CSS grade: activate to sort column ascending">
                              头像
                            </th>
                            <th  style="width:5000px;" aria-label="CSS grade: activate to sort column ascending">
                              注册时间
                            </th>
                            <th  style="width: 95px;" aria-label="CSS grade: activate to sort column ascending">
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
                    @endif 

                        ">
                            <td class="">
                              {{$v->uid}}
                            </td>
                            <td class="uname">
                              {{$v->uname}}
                            </td>
                            <td class="">
                              {{$v->name}}
                            </td>
                            <td class="">
                        @if($v->sex == 1)
                          女
                        @else
                           男
                        @endif
                            </td>
                            <td class="">
                              {{$v->addr}}
                            </td>
                            <td class="">
                              {{$v->age}}
                            </td>
                            <td class="">
                              {{$v->tel}}
                            </td>
                             <td class=" "><img src="{{$v->upic}}" alt=""></td>
                            <td class="" >
                             {{date('Y-m-d',$v->ctime)}}
                            </td>
                             
                            <td class=" ">
                       <span class="btn-group">
                                            
                                            <a href="/admin/member/{{$v->uid}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>

                                           <form action="/admin/member/{{$v->uid}}" method='post' style='display:inline'>
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
                


                <div class="dataTables_info" id="DataTables_Table_1_info">共{{$count}}条</div>


                
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
    </div>
    <!-- Panels End -->
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
    $('.uname').dblclick(function(){
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
            var uid = $(this).parents('tr').find('td').eq(0).text();

            //获取输入的值
            var uname = ipn.val();

            //发送ajax
            $.post('/admin/ajax',{uid:uid,uname:uname},function(data){


                if(data == '1'){

                    //把td 中间的文本换成输入的值


                    td.text(uname);
                } else {

                    td.text(um);
                }

            })



        })



    })



</script>


@endsection

