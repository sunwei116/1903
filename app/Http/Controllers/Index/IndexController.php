<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IndexModel\User;
use App\Model\Goods;
use App\Model\Category;

class IndexController extends Controller
{
    //用户注册
    public function register()
    {
        $user_name = \request()->input('user_name');
        $user_pwd = \request()->input('user_pwd');
        $user_sex = \request()->input('user_sex');
        $user_age = \request()->input('user_age');
        $user_phone = \request()->input('user_phone');
        if ($user_name && $user_age && $user_pwd && $user_sex && $user_phone) {
            $res = User::insert([
                        'user_name'=>$user_name,
                        'user_pwd'=>$user_pwd,
                        'user_sex'=>$user_sex,
                        'user_age'=>$user_age,
                        'user_phone'=>$user_phone
                    ]);
            if ( $res ) {
                echo json_encode(['msg'=>'注册成功','data'=>$res,'code'=>1]);die;
            }else{
                echo json_encode(['msg'=>'注册失败','data'=>$res,'code'=>2]);die;
            }
        }else{
            echo json_encode(['msg'=>'参数不正确','data'=>null,'code'=>2]);die;
        }
    }
    //获取商品
    public function getGoods()
    {
        $data = Goods::getGoods();

    }


}
