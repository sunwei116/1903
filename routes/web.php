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

Route::get('/', function () {
    return view('welcome');
});
//后台
Route::prefix('admin')->group(function () {

    //防止用户非法登陆；
    Route::group(['middleware'=>'admin'],function (){

        Route::any('index','Admin\UserController@index'); //后台首页
        Route::any('category_add','Admin\UserController@category_add'); //添加分类

    });


});
 //退出  登陆
  Route::any('admin/login_do','Admin\UserController@login_do'); //登录执行
  Route::any('admin/register','Admin\UserController@register');
  Route::any('admin/login','Admin\UserController@login'); //登录
  Route::any('admin/quit','Admin\UserController@quit');

