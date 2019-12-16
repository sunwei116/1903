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
    Route::any('register','Admin\UserController@register');
    Route::any('brand_add','Admin\UserController@brand_add');
    Route::any('brand_add_do','Admin\UserController@brand_add_do');
    Route::any('brand_list','Admin\UserController@brand_list');
    Route::any('brand_del','Admin\UserController@brand_del');
    Route::any('brand_upd','Admin\UserController@brand_upd');
    Route::any('brand_upd_do','Admin\UserController@brand_upd_do');
});

