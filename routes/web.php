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


    //防止用户非法登陆；
    Route::group(['middleware'=>'admin'],function (){

        Route::any('index','Admin\UserController@index');  //后台首页
        Route::any('category_add','Admin\UserController@category_add');//添加分类
        Route::any('index','Admin\UserController@index'); //后台首页
        Route::any('category_add','Admin\UserController@category_add'); //添加分类
        Route::any('category_add_do','Admin\UserController@category_add_do'); //添加分类执行
        Route::any('category_list','Admin\UserController@category_list'); //分类列表
        Route::any('category_del','Admin\UserController@category_del'); //分类删除
        Route::any('category_update','Admin\UserController@category_update'); //分类修改
        Route::any('goods_add','Admin\GoodsController@goods_add');
        Route::any('up','Admin\GoodsController@up');
        Route::any('img_add','Admin\GoodsController@img_add');
        Route::any('goods_list','Admin\GoodsController@goods_list');
        Route::any('goods_del','Admin\GoodsController@goods_del');
        Route::any('images','Admin\GoodsController@images');
        Route::any('admin_add','Admin\UserController@admin_add'); //管理员添加
        Route::any('role_add','Admin\UserController@role_add'); //角色添加
    });


});
 //退出  登陆
  Route::any('admin/login_do','Admin\UserController@login_do'); //登录执行
  Route::any('admin/register','Admin\UserController@register'); //注册
  Route::any('admin/login','Admin\UserController@login'); //登录
  Route::any('admin/quit','Admin\UserController@quit');  //退出当前账号

