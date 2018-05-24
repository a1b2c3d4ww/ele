<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/','home\FirstController@index');//前台首页
Route::get('/home/login','home\HomeController@login');//登录
Route::post('/home/dologin','home\LoginController@dologin');//登录验证
Route::get('/home/code/{tmp}','home\LoginController@captcha');//验证码
Route::get('/home/logout','home\LoginController@logout');//退出登录
Route::get('/home/reg','home\HomeController@reg');//注册
Route::post('/home/doreg','home\RegisterController@doreg');//注册验证
Route::post('/home/yzm','home\RegisterController@yzm');//发送短信
Route::post('/home/message','home\RegisterController@message');//短信验证
//ajax相关
Route::get('/home/firstajax/{id}','home\AjaxController@firstajax');
Route::get('/home/listajax/{id}','home\AjaxController@listajax');	
Route::get('/home/cartajax/{id}','home\AjaxController@cartajax');	
Route::get('/home/addcartajax/{id}','home\AjaxController@addcartajax');//添加菜品	
Route::get('/home/subcartajax/{id}','home\AjaxController@subcartajax');	//减少菜品
Route::get('/home/enshrineajax/{id}','home\AjaxController@enshrineajax');	//收藏
//前台

Route::group([],function(){
	Route::get('/home/merchant/index/{id}','home\MerchantController@index');//商家详情
	Route::get('/home/orderest/index/{id}','home\OrderestController@index');//提交订单
	Route::post('/home/orderest/pay','home\OrderestController@pay');//订单支付
	Route::get('/home/orderest/finish','home\OrderestController@finish');//订单完成

	Route::get('/home/myorder','home\MyorderController@myorder');//订单页面
	Route::get('/home/orderdetail','home\MyorderController@orderdetail');

	Route::get('/home/payend','home\MyorderController@payend');//支付成功
	Route::get('/home/myself','home\MyselfController@myself');//个人中心
	Route::get('/home/orderdetails/{id1}/{id2}','home\MyselfController@orderdetails');//订单详情
	Route::get('/home/myinfo','home\MyselfController@myinfo');//个人资料
	Route::get('/home/addr','home\MyorderController@addr');//地址管理
	Route::get('/home/enshrine','home\MyselfController@enshrine');//我的收藏
	Route::get('/home/enshrine/del/{id}','home\MyselfController@enshrinedel');//删除收藏
	Route::get('/home/mycarts','home\MyselfController@mycarts');//我的购物车
	Route::get('/home/mycarts/del/{id}','home\MyselfController@mycartsdel');//我的购物车
	Route::get('/home/reviews/{id}','home\MyselfController@reviews');//评论

	Route::resource('home/user','home\UserController');
	
});
Route::group([],function(){
	
	Route::get('admin/greencate/delete/{id}','admin\GreencateController@delete');
	Route::post('admin/greencate/update/{id}','admin\GreencateController@update');
	Route::get('admin/greencate/edit/{id}','admin\GreencateController@edit');
	Route::get('admin/greencate/index','admin\GreencateController@index');
	Route::get('admin/greencate/create/{id}','admin\GreencateController@create');
	Route::post('admin/greencate/store','admin\GreencateController@store');

	});
Route::group([],function(){
	Route::get('admin/green/delete/{id}','admin\GreenController@delete');
	Route::post('admin/green/store','admin\GreenController@store');
	Route::get('admin/green/index','admin\GreenController@index');
	Route::get('admin/green/edit/{id}','admin\GreenController@edit');
	Route::get('admin/green/{id1}/{id2}','admin\GreenController@create');
	Route::post('admin/green/update/{id}','admin\GreenController@update');
	});	
Route::group([],function(){

	Route::post('admin/adminajax','admin\IndexController@adminajax');
	Route::post('admin/cateajax','admin\IndexController@cateajax');
	Route::post('admin/merchantajax','admin\IndexController@merchantajax');
	Route::resource('admin/user','admin\UserController');
	Route::resource('admin/cate','admin\CateController');
	Route::resource('admin/merchant','admin\MerchantController');
	Route::resource('admin/green','admin\GreenController');	
});
Route::group([],function(){
	Route::get('admin/merchantup/{id}','admin\StatusController@merchantup');
	Route::get('admin/merchantdown/{id}','admin\StatusController@merchantdown');
	Route::get('admin/greenup/{id}','admin\StatusController@greenup');
	Route::get('admin/greendown/{id}','admin\StatusController@greendown');
});	

Route::group([],function(){

	Route::resource('admin/member','admin\EleController');
	Route::resource('admin/links','admin\LinksController');
	Route::resource('admin/adver','admin\AdverController');
	Route::resource('admin/orders','admin\OrdersController');
	Route::resource('admin/reviews','admin\ReviewsController');
	Route::get('admin/read/{id}','admin\OrdersController@read');
	Route::post('admin/ajax','admin\EleController@Ajax');
	Route::post('admin/linksajax','admin\LinksController@linksAjax');
	Route::post('admin/adverajax','admin\AdverController@adverAjax');
	Route::get('admin/up/{id}','admin\StatusController@adverup');
	Route::get('admin/down/{id}','admin\StatusController@adverdown');
	Route::get('admin/linkup/{id}','admin\StatusController@linkup');
	Route::get('admin/linkdown/{id}','admin\StatusController@linkdown');
	
});
 
     Route::post('admin/dologin','admin\LoginController@dologin');
	Route::get('admin/login','admin\LoginController@login');




