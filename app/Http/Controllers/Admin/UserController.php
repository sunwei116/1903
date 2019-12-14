<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\User;
class UserController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function login_do()
    {
        $user_name = request()->input('user_name');
        $password = request()->input('password');
        $data = User::where(['user_name' => $user_name])->first();
        if ($data == null){
            return json_encode(['message'=>'没有此用户','code'=>'1','data'=>null]);die;
        }
        $data = User::where(['user_name'=>$user_name,'user_pwd'=>$password])->first();
        if ($data == 'null'){
            return json_encode(['message'=>'密码错误','code'=>'1','data'=>null]);die;
        }else{
            return json_encode(['message'=>'登录成功','code'=>'2','data'=>' ']);die;
        }
    }

    public function register(Request $request)
    {
        if($request->isMethod('post'))
        {
            $info=$request->all();
            if(!empty($info))
            {
                $res=User::insert($info);


                if($res){
                     $arr=[
                         'error'=>1
                     ];
                     $re=json_encode($arr);

                    return $re;
                }else {
                     $arr=[
                       'error'=>2
                     ];
                     $re=json_encode($arr);
                     return $re;
                    }
            }
        }
        return view('admin.register');
    }


    public function index()
    {
        return view('admin.index');
    }

}
