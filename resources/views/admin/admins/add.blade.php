@extends('layout.admin')
@section('title','用户添加')
@section('content')
        @if (count($errors) > 0)
            <div class="mws-form-message error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li style='color:blue;font-size:17px;list-style:none'>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('warning'))
     <div class="mws-form-message error">
        {{ session('warning') }}
        </div>
         @endif
				<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-ok"></i>添加用户</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form  class="mws-form" action="/admin/user" method="post">
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">账号</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="aname" class="required small">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">密码</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="password" class="required email small">
                                    </div>
                                </div>
                                    <div class="mws-form-row">
                                    <label class="mws-form-label">确认密码</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="repass" class="required email small">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">电话</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="tel" class="required url small">
                                    </div>
                                </div>
                            	
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">权限</label>
                                	<div class="mws-form-item">
                    					<select class="required small " name="auth">
                    						<option value="1">超级管理员</option>
                    						<option value="2">普通管理员</option>
                    					</select>
                                    </div>
                                </div>
                          
                            	 {{ csrf_field() }}
                    			
                            </div>
                            <div class="mws-button-row ">
                            	<center><input type="submit" class="btn btn-danger"></center>
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