@extends('layout.admin')
@section('title','用户添加页面')
@section('content')
				<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-ok"></i>添加用户</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form id="mws-validate" class="mws-form" action="form_elements.html">
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">用户名</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="reqField" class="required middle">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">Email Validation</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="emailField" class="required email large">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">URL Validation</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="urlField" class="required url large">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">Digit Validation</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="ageField" class="required digits large">
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">Select Box Validation</label>
                                	<div class="mws-form-item">
                    					<select class="required large" name="selectBox">
                                        	<option></option>
                    						<option>Option 1</option>
                    						<option>Option 3</option>
                    						<option>Option 4</option>
                    						<option>Option 5</option>
                    					</select>
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">File Input Validation</label>
                                	<div class="mws-form-item">
                                    	<input type="file" name="picture" class="required">
                                        <label for="picture" class="error" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">Spinner Validation</label>
                                	<div class="mws-form-item">
                                        <input type="text" id="s4" name="spinner" class="required mws-spinner" value="10">
                                        <label for="s4" class="error" generated="true" style="display:none"></label>
                                    </div>
                                </div>
                    			<div class="mws-form-row">
                    				<label class="mws-form-label">Radiobutton Validation</label>
                    				<div class="mws-form-item">
                                    	<ul class="mws-form-list">
                                        	<li><input id="gender_male" type="radio" name="gender" class="required"> <label for="gender_male">Male</label></li>
                                        	<li><input id="gender_female" type="radio" name="gender"> <label for="gender_female">Female</label></li>
                                        </ul>
                                        <label for="gender" class="error plain" generated="true" style="display:none"></label>
                    				</div>
                    			</div>
                            </div>
                            <div class="mws-button-row">
                            	<input type="submit" class="btn btn-danger">
                            </div>
                        </form>
                    </div>    	
                </div>
@endsection

