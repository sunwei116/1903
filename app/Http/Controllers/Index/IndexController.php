<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IndexModel\User;
use App\Model\Goods;

class IndexController extends Controller
{
    //用户注册
    public function register()
    {
        $user_name = isset($_POST['user_name']) ? $_POST['name'] : '';
        $user_pwd = isset($_POST['user_pwd']) ? $_POST['user_pwd'] : '';
        $user_sex = isset($_POST['user_sex']) ? $_POST['user_sex'] : '';
        $user_age = isset($_POST['user_age']) ? $_POST['user_age'] : '';
        $user_phone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
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

    public function goods_desc()
    {
        $data = \request()->input();
    }

}
