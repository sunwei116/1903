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
   Route::any('login','Admin\UserController@login'); //登录
   Route::any('login_do','Admin\UserController@login_do'); //登录执行
   Route::any('register','Admin\UserController@register');
    Route::any('index','Admin\UserController@index'); //后台首页
    Route::any('category_add','Admin\UserController@category_add'); //添加分类
    Route::any('category_add_do','Admin\UserController@category_add_do'); //添加分类执行
    Route::any('category_list','Admin\UserController@category_list'); //分类列表
    Route::any('category_del','Admin\UserController@category_del'); //分类删除
    Route::any('category_update','Admin\UserController@category_update'); //分类修改
    Route::any('register','Admin\UserController@register');

});

