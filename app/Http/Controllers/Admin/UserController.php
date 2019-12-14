<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @content  登录
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     * @return false|string
     * @content  登录执行
     */
    public function login_do()
    {
        $admin_name = request()->input('admin_name');
        $password = request()->input('password');
        $data = Admin::where(['admin_name' => $admin_name])->first();
        if ($data == null){
            return json_encode(['message'=>'没有此用户','code'=>'1','data'=>null]);die;
        }
        $data = Admin::where(['admin_name'=>$admin_name,'password'=>$password])->first();
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


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @content  后台首页
     */


    public function index()
    {
        return view('admin.index');
    }

    public function category_add()
    {
        return view('admin.category_add');
    }
}
