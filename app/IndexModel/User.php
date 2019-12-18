<?php

namespace App\IndexModel;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="user_id";

    //登录
    public static function login($user_name, $user_pwd)
    {
       //根据用户名密码查询
        $data = self::where(['user_name'=>$user_name])->where(['user_pwd'=>$user_pwd])->first();
//        //查不到此用户
        if (empty($data)) {
            echo json_encode(['code' => 2, 'msg' => '账号或密码输入错误', 'data' => $data]);
            exit;
        }
        $user_id = $data['user_id'];
//        生成过期时间
        $time_out = time()+3600;
        $token = self::setToken();
        //更新touken
        $user = self::find($user_id);
        $user->time_out = $time_out;
        $user->token = $token;
        $res = $user->save();
        if ($res) {
            echo json_encode(['code' => 1, 'msg' => '登录成功', 'data' => ['token'=>$token]]);die;
        }else{
            echo json_encode(['code' => 2, 'msg' => '登录失败', 'data' => $data]);die;
        }
    }
    //注册
    public static function register($user_name, $user_pwd, $user_phone)
    {
        if (!empty($user_name) && !empty($user_pwd) && !empty($user_phone)) {
            $data = self::where(['user_name'=>$user_name])->where('phone',$user_phone)->first();
            if ($data) {
                $res = self::insert([
                    'user_name' => $user_name,
                    'user_pwd' => $user_pwd,
                    'user_phone' => $user_phone
                ]);
                if ($res) {
                    return json_encode(['msg' => '注册成功', 'data' => $res, 'code' => 1]);exit;
                } else {
                    return json_encode(['msg' => '注册失败', 'data' => $res, 'code' => 2]);exit;
                }
            }else{
                return json_encode(['msg' => '用户名或手机号已被注册', 'data' => null, 'code' => 2]);exit;
            }
        }
    }
    //生成token
    public static function setToken()
    {
        $str = md5(uniqid(md5(microtime(true)),true));
        $str = sha1($str);
        return $str;
    }
    //查看token
    public static function checkToken($token)
    {
        if (empty($token)) {
            echo json_encode(['code' => 2, 'msg' => '请求失败', 'data' => null]);exit;
        }
        $tokenCheck = self::checkToken($token);
        if ($tokenCheck != 0001) {
            echo json_encode(['code' => 2, 'msg' => 'token验证失败', 'data' => null]);exit;
        }
        return true;

    }
    //token验证
    public static function checkTokenFct($token)
    {
        $res = self::where(['token'=>$token])->first();
        if (!empty($res)) {
            if ((time() - $res->time_out) > 0) {
                echo json_encode(['code' => 2, 'msg' => 'token长时间未使用而过期，需重新登陆', 'data' => null]);exit;
            }
        }
        $new_time_out = time()+3600;
        $res->time_out = $new_time_out;
        $res = $res->save();
        if ($res) {
            return 0001;  //token验证成功，time_out刷新成功，可以获取接口信息
        }else{
            return 0002;  //token错误验证失败
        }
    }


}
