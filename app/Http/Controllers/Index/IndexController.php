<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\IndexModel\User;
use App\Model\Goods;
use App\Model\Category;

class IndexController extends Controller
{
    //前台登录
    public function login(Request $request)
    {
        if(empty($_POST['user_name']) || empty($_POST['user_pwd'])) {
            echo json_encode(['code' => 2, 'msg' => '请输入账号和密码', 'data' => null]);exit;

        }
        $user_name=$_POST['user_name'];
        $user_pwd=$_POST['user_pwd'];;
        return User::login($user_name,$user_pwd);
    }

    /**
     * @centent 注册
     */
    public function register()
    {
        header('Access-Control-Allow-Origin:*');
        // 响应类型
        header('Access-Control-Allow-Methods:*');
        //请求头
        header('Access-Control-Allow-Headers:*');
        // 响应头设置
        header('Access-Control-Allow-Credentials:false');
        //数据类型
        header('content-type:application:json;charset=utf8');

        $user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
        $user_pwd = isset($_POST['user_pwd']) ? $_POST['user_pwd'] : '';
        $user_phone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
        return User::register($user_name, $user_pwd, $user_phone);
    }



    /**
     *
     */
    public function goods_desc()
    {
        $data = \request()->input();
    }




}
