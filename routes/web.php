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
        Route::any('images_show','Admin\GoodsController@images_show');//轮播图
        Route::any('images_list','Admin\GoodsController@images_list');//轮播图列表
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

    Route::any('cart_add', 'Index\GoodsController@cart_add');//加入购物车
});

    Route::any('register', 'Index\IndexController@register');  //注册
    Route::any('login', 'Index\IndexController@login');  // 登录
    Route::any('cate','Index\UserController@cate');//分类展示
    Route::any('get_goods_all','Index\IndexController@get_goods_all');//获取所有商品
    Route::any('getGoods','Index\IndexController@getGoods');   //获取所有商品
    Route::any('getGoods','Index\IndexController@getGoods');//获取所有商品
    Route::any('goods_show', 'Index\GoodsController@goods_show');  // 商品接口
    Route::any('images_api', 'Index\GoodsController@images_api');  // 轮播图接口
    Route::any('goods_desc', 'Index\IndexController@goods_desc');  //  商品详情
    Route::any('get_goods_imgs', 'Index\IndexController@get_goods_imgs');  //  商品轮播图
    Route::any('get_goods_attr', 'Index\IndexController@get_goods_attr');  //  商品属性
    Route::any('login', 'Index\IndexController@login');  //
    Route::any('goods_show', 'Index\GoodsController@goods_show');   // 商品接口
    Route::any('images_api', 'Index\GoodsController@images_api');  // 轮播图接口
    Route::any('category', 'Index\IndexController@category');   // 分类接口
    Route::any('category_goods_list', 'Index\IndexController@category_goods_list');   // 分类下面所有的商品
    Route::any('getregion','Index\UserController@getregion');//四级联动
    Route::any('getregion_do','Index\UserController@getregion_do');//四级联动
    Route::any('region_do','Index\UserController@region_do');//四级联动
    Route::any('region_list','Index\UserController@region_list');//四级联动
});



