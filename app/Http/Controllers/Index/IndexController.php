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

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");
        header('Access-Control-Allow-Headers:x-requested-with,content-type');

        $re=$request->all();
        $info=User::where(['user_name'=>$re['user_name']])->first();
        if($info==null)
        {
            $arr=[
                'error'=>2,
                'msg'=>'用户不存在',
                'data'=>null
            ];

            $array=json_encode($arr);
            return $array;
        }

        $data=User::where(['user_name'=>$re['user_name'],'user_pwd'=>$re['user_pwd']])->first();

        if($data=='null')
        {
            $arr=[
                'error'=>2,
                'msg'=>'用户名或密码错误',
                'data'=>null
            ];

            $array=json_encode($arr);
            return $array;
        }else{
            $arr=[
                'error'=>1,
                'msg'=>'登录成功',
                'data'=>null
            ];
            $array=json_encode($arr);
            return $array;
        }
    }

}
