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
//默认访问目录
 Route::get('/', function () {
     return view('index/index');
 });


Route::get('test/index','TestController@index');
Route::get('test/addMessage','TestController@addMessage');	
Route::get('test/delMessage','TestController@delMessage');	
Route::get('test/modifyMessage','TestController@modifyMessage');	
Route::get('test/getone','TestController@getone');
Route::any('login/login','LoginController@login');
Route::any('register/register','RegisterController@register');
Route::any('register/register_add','RegisterController@register_add');


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
