<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
//设置默认访问控制器方法名
Route::any('/', function () {
	// echo 123456;
    return view('index/index');
});
Route::any('login/login','LoginController@login');
Route::any('register/register','RegisterController@register');
Route::any('register/register_add','RegisterController@register_add');
Route::any('login/loginShow','LoginController@Dologin');
Route::get('register/captcha/{tmp}', 'RegisterController@captcha');
// Route::any('/','IndexController@index');//设置默认访问控制器方法名
// Route::any('test/index','TestController@index'); 
// Route::get('test/addMessage','TestController@addMessage');	
// Route::get('test/delMessage','TestController@delMessage');	
// Route::get('test/modifyMessage','TestController@modifyMessage');	
// Route::get('test/getone','TestController@getone');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
