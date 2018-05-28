@extends('layout.admin')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('title','管理员列表')

@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>
            <i class="icon-table">
            </i>
           管理员列表
        </span>
    </div>
    @if(session('msg'))
    <div class="mws-form-message success">
        <ul>
            <li style="list-style: none;">{{session('msg')}}</li>
        </ul>
        
    </div>

    @endif
    <div class="mws-panel-body no-padding">
        <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        	<form action="/admin/user" method="get">
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
                    <input type="text" placeholder="用户名" name="search" aria-controls="DataTables_Table_1" value="{{$search}}">
              		<select name="auth">
              			<option  value="">全部</option>
              			<option @if($auth=='1') selected @endif value="1">超级管理员</option>
              			<option @if($auth=='2') selected @endif value="2">普通管理员</option>
              		</select>
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
                            用户名
                        </th>
                        <th 
                        style="width: 174px;">
                           电话
                        </th>
                        <th 
                        style="width: 122px;">
                           权限
                        </th>
                        <th 
                        style="width: 90px;">
                            操作
                        </th>
                    </tr>
                </thead>
                <tbody role="alert" aria-live="polite" aria-relevant="all">
                	@foreach($res as $k=>$v)
                    <tr align="center" class=" @if($k % 2 == 1) 
                        odd 
                    @else
                        even
                    @endif 
">
                        <td class="">
                            {{$v->aid}}
                        </td>
                        <td class="aname">
                            {{$v->aname}}

                        </td>
                        <td class=" ">
                            {{$v->tel}}
                        </td>
                        <td class=" ">
                            @if($v->auth=='1')
                            超级管理员
                            @elseif($v->auth=='2')
                            普通管理员
                            @endif
                        </td>
                        <td class=" ">
                   
	                     	 <span class="btn-group">	                     


	                            <a href="/admin/user/{{$v->aid}}/edit" class="btn btn-small"><i class="icon-pencil"></i></a>


                                
                            <form action="/admin/user/{{$v->aid}}" method="post" style='display:inline'>
                                {{csrf_field()}}
                               {{method_field('DELETE')}}
	                            <button class="btn btn-small" onclick="return confirm('你确定要删除吗?')"><i class="icon-trash"></i></button>
                                </form>
	                         </span>
                                
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
          {{$res->appends($arr)->links()}}
            </div>
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
    
 
    $('.aname').dblclick(function(){
      
        var um = $(this).text().trim();

   
        var ipn = $('<input type="text" />');
 
        $(this).empty();
        $(this).append(ipn);

        ipn.val(um);

        ipn.focus();

        ipn.select();

        var td = $(this);

        ipn.blur(function(){


            var aid = $(this).parents('tr').find('td').eq(0).text();

    
            var aname = ipn.val();
                
            console.log(aid);
            $.post('/admin/adminajax',{aid:aid,aname:aname},function(data){
                console.log('aa');

                if(data == '1'){


                    td.text(aname);
                } else {

                    td.text(um);
                }

            })



        })



    })



</script>
@endsection