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
});

