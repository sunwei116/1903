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
<<<<<<< Updated upstream

         $re=$request->all();
        $info=User::where(['user_name'=>$re['user_name']])->first();
        if($info==null)
        {
            $arr=[
                'error'=>2,
                'msg'=>'用户不存在',
                'data'=>null
            ];
=======
        $token = '4389dd2f5aec6294dd5a20d9f8654208aed98712';
        dd(User::checkToken($token));
        if(empty($_POST['user_name']) || empty($_POST['user_pwd'])) {
            echo json_encode(['code' => 2, 'msg' => '请输入账号和密码', 'data' => null]);exit;
>>>>>>> Stashed changes

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
        $user_name = isset($_POST['user_name']) ? $_POST['name'] : '';
        $user_pwd = isset($_POST['user_pwd']) ? $_POST['user_pwd'] : '';
        $user_phone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
        User::register($user_name, $user_pwd, $user_phone);
    }

    /**
     *
     */
    public function goods_desc()
    {
        $data = \request()->input();
    }
}
