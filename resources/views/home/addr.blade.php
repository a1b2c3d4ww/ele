@extends('layout.home')

@section('title','地址管理')

@section('content')
<div style="width:100%;height:10px"></div>
    <div class="ng-scope">
    <div class="profile-container container">
        @include('layout.list')
<div class="profile-panel" role="main">
    <h3 ng-if="pageTitleVisible" class="profile-paneltitle ng-scope">
        <span ng-bind="pageTitle" class="ng-binding">
            地址管理
        </span>
        <span class="subtitle ng-binding" ng-bind-html="pageSubtitle | toTrusted">
        </span>
    </h3>
    <!-- end ngIf: pageTitleVisible -->
    <div class="profile-panelcontent" ng-transclude="">
        <div class="desktop-addresslist clearfix ng-scope" ng-hide="addressLoading">

            


            <button class="desktop-addressblock desktop-addressblock-addblock" id="tan">
                <i class="icon-plus">
                </i>
                添加新地址
            </button>
        </div>
    </div>
</div>


    <div id="dvs" style="display:none;" onclick="down()"></div>

<script>
    $('#tan').click(function(){
        $('#haha').attr('style','display:block;z-index:1003;left:245px;top:100px;');
        $('#dvs').attr('style','display:block;z-index:1002;position:fixed;left:0px;top:0px;width:100%;height:100%;opacity:0.5;background:rgb(0, 0, 0);');
    });

    function down(){
        $('#haha').attr('style','display:none;');
        $('#dvs').attr('style','display:none;');
    }


    function up(){
        var dvs = $(`<div class="desktop-addressblock ng-scope" name="zero">
                        <div class="desktop-addressblock-buttons">
                            <button class="desktop-addressblock-button" name="edit">
                                修改
                            </button>
                            <button class="desktop-addressblock-button" name="del">
                                删除
                            </button>
                        </div>
                        <div class="desktop-addressblock-name ng-binding">
                            许硕
                            <span class="ng-binding">
                                先生
                            </span>
                        </div>
                        <div class="desktop-addressblock-address ng-binding">
                            天津海昌极地广场外滩南岸度假公寓 极地广场32栋4门501
                        </div>
                        <div class="desktop-addressblock-mobile ng-binding">
                            15131577303
                        </div>
                        <div class="desktop-addressblock-mask ng-hide" name="one">
                        </div>
                        <div class="desktop-addressblock-removebuttons ng-hide" name="two">
                            <p>
                                确定删除收货地址?
                            </p>
                            <button class="confirmdelete" name="third">
                                确定
                            </button>
                            <button class="canceldelete" name="four">
                                取消
                            </button>
                        </div></div>`);
        $('#tan').before(dvs);

        $('button[name=edit]').click(function(){
            $('#haha').attr('style','display:block;z-index:1003;left:245px;top:100px;');
            $('#dvs').attr('style','display:block;z-index:1002;position:fixed;left:0px;top:0px;width:100%;height:100%;opacity:0.5;background:rgb(0, 0, 0);');
        });


        $('button[name=del]').click(function(){
            $(this).parent().siblings().eq(3).removeClass('ng-hide');
            $(this).parent().siblings().eq(4).removeClass('ng-hide');    
        });

        $('button[name=third]').click(function(){
            $(this).parent().parent().remove();
        });

        $('button[name=four]').click(function(){
            $(this).parent().addClass('ng-hide');
            var aa = $(this).parent().siblings().eq(4).addClass('ng-hide');;           
        });
    }

</script>

<div class="addressdialog" id="haha"  style="display:none;">
    <div class="addressdialog-close" id="off" onclick="down()">
    </div>
    <div class="addressdialog-header">
        添加新地址
    </div>
    <div class="addressdialog-content">

        <!-- <form action="" > -->

        
        <div class="addressform">
            <div>
                <div class="addressformfield">
                    <label id="xing">
                        姓名
                    </label>
                    <input placeholder="请输入您的姓名" name="uname">
                    <div class="addressformfield-hint">
                        <span>
                        </span>
                    </div>
                </div>
                <div class="addressformfield sexfield">
                    <label>
                        性别
                    </label>
                    <div>
                        <input id="sexfield-1-male" name="sex" type="radio" value="1">
                        <label for="sexfield-1-male">
                            先生
                        </label>
                        <input id="sexfield-1-female" type="radio" name="sex" value="2">
                        <label for="sexfield-1-female">
                            女士
                        </label>
                    </div>
                    <div class="addressformfield-hint">
                        <span>
                        </span>
                    </div>
                </div>
                <div class="addressformfield">
                    <label>
                        位置
                    </label>
                    <input placeholder="请输入小区、大厦或学校" name="addr">
                    <div class="address-suggestlist">
                        <ul>
                        </ul>
                    </div>
                    <div class="addressformfield-hint">
                        <span>
                        </span>
                    </div>
                </div>
                <div class="addressformfield">
                    <label>
                        详细地址
                    </label>
                    <input placeholder="单元、门牌号" name="detail">
                    <div class="addressformfield-hint">
                        <span>
                        </span>
                    </div>
                </div>
                <div class="addressformfield phonefield">
                    <label>
                        手机号
                    </label>
                    <input placeholder="请输入您的手机号" name="phone">
                    <div class="addressformfield-hint">
                        <span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="addressform-buttons">

                <button  onclick="up();down()">

                    保存
                </button>
                <button type="button" onclick="down()">
                    取消
                </button>
            </div>
        </div>

        <!-- </form> -->

    </div>
</div>

@endsection