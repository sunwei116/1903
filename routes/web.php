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
        Route::any('goods_del','Admin\GoodsController@goods_del');//
        Route::any('images','Admin\GoodsController@images');//轮播图添加 uploadify
        Route::any('images_add','Admin\GoodsController@images_add');//轮播图
        Route::any('admin_add','Admin\UserController@admin_add'); //管理员添加
        Route::any('admin_role','Admin\UserController@admin_role'); //管理员分配角色
        Route::any('admin_add','Admin\UserController@admin_add'); //管理员添加用户
        Route::any('admin_del','Admin\UserController@admin_del'); //管理员-用户 删除
        Route::any('admin_list','Admin\UserController@admin_list'); //用户列表
        Route::any('is_admin_update','Admin\UserController@is_admin_update'); //修改是为否管理员
        Route::any('role_right','Admin\UserController@role_right'); //角色分配权限
        Route::any('role_add','Admin\UserController@role_add'); //角色添加
        Route::any('role_list','Admin\UserController@role_list'); //角色列表
        Route::any('role_del','Admin\UserController@role_del'); //角色删除
        Route::any('right','Admin\UserController@right'); //权限管理
        Route::any('right_add','Admin\UserController@right_add'); //权限添加
        Route::any('brand_add','Admin\UserController@brand_add');//品牌添加
        Route::any('brand_add_do','Admin\UserController@brand_add_do');//品牌添加
        Route::any('brand_list','Admin\UserController@brand_list');//品牌列表
        Route::any('brand_del','Admin\UserController@brand_del');//品牌
        Route::any('brand_upd','Admin\UserController@brand_upd');//品牌
        Route::any('brand_upd_do','Admin\UserController@brand_upd_do');//品牌
   });
});
  
     //退出  登陆
      Route::any('admin/login_do','Admin\UserController@login_do'); //登录执行
      Route::any('admin/register','Admin\UserController@register'); //注册
      Route::any('admin/login','Admin\UserController@login'); //登录
      Route::any('admin/quit','Admin\UserController@quit');  //退出当前账号


//------------------------------------------------------------------------------------------*-----------------------------**//
//前台
Route::prefix('index')->group(function () {

Route::middleware(['apiheader'])->group(function(){
	 Route::any('cate','Index\UserController@cate');//分类展示
	 Route::any('getGoods','Index\IndexController@getGoods');//获取所有商品
     Route::any('login', 'Index\IndexController@login');  //
     Route::any('goods_list', 'Index\GoodsController@goods_show');  //

});

});



