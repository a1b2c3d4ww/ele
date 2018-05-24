
@extends('layout.admin')

@section('title',$title)


@section('content')
<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        
        @if (count($errors) > 0)
            <div class="mws-form-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style='color:blue;font-size:17px;list-style:none'>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="/admin/links/{{$res->yid}}" method='post' class="mws-form" enctype='multipart/form-data'>
            <div class="mws-form-inline">
                <div class="mws-form-row">
                    <label class="mws-form-label">链接</label>
                    <div class="mws-form-item">
                        <input type="text" name='ylinks' class="small" value="{{$res->ylinks}}">
                    </div>
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">排序</label>
                    <div class="mws-form-item">
                        <input type="text" name='sort' class="small" value="{{$res->sort}}">
                    </div>
                </div>
                  <div class="mws-form-row">
                    <label class="mws-form-label">链接名</label>
                    <div class="mws-form-item">
                        <input type="text" name='yname' class="small" value="{{$res->yname}}">
                    </div>
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">链接图片</label>
                    <div class="mws-form-item">
                        <img src="{{$res->ypic}}" alt="" width='180px' height='120px'>
                        <input type="file" name='ypic' readonly="readonly" style="width: 100%; padding-right: 85px;" class="fileinput-preview" placeholder="No file selected...">
                    </div>
                </div>

                
            <div class="mws-button-row">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <input type="submit" class="btn btn-danger" value="提交">
                
            </div>
        </form>
    </div>      
</div>

@endsection

@section('js')
<script>
    $('.mws-form-message').delay(3000).slideUp(1000);

</script>

@endsection