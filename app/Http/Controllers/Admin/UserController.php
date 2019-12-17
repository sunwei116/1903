<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Brand;
use App\Model\Category;

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
    public function login_do(Request $request)
    {
        $admin_name = request()->input('admin_name');
        $password = request()->input('password');
        $data = Admin::where(['admin_name' => $admin_name])->first();
        $admin_id=$data['admin_id'];
        if ($data == null){
            return json_encode(['message'=>'没有此用户','code'=>'1','data'=>null]);die;
        }
        $data = Admin::where(['admin_name'=>$admin_name,'password'=>$password])->first();
        if ($data == 'null'){
            return json_encode(['message'=>'密码错误','code'=>'1','data'=>null]);die;
        }else{
            $rea=$request->session()->put('admin',$admin_id);
            return json_encode(['message'=>'登录成功','code'=>'2','data'=>' ']);die;
        }
    }
    //注册
    public function register(Request $request)
    {
        if($request->isMethod('post'))
        {
            $info=$request->all();
            if(!empty($info))
            {
                $res=Admin::insert($info);


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


    //后台
    public function index()
    {
        return view('admin.index');
    }

    /**
     * 分类
     * @return [type] [description]
     */

    public function category_add()
    {
        return view('admin.category_add');
    }



    /**
     * 品牌管理
     */
    public function brand_add()
    {
        return view('admin.brand_add');
    }


    public function brand_add_do()
    {
        $brand_name = request()->input('brand_name');
        $brand_desc = request()->input('brand_desc');
        // dd($brand_desc);
        $data = Brand::insert([
            'brand_name'=>$brand_name,
            'brand_desc'=>$brand_desc
        ]);
        // dd($data);
        if($data){
            return json_encode(['ret'=>1,'res'=>'添加成功']);
        }else{
            return json_encode(['ret'=>2,'res'=>'添加失败']);
        }
    }


    public function brand_list()
    {
        $data = Brand::paginate(5);
        // dd($data);
        return view('admin.brand_list',['data'=>$data]);
    }


    public function brand_del()
    {
        $id = request()->input('brand_id');
        $data = Brand::where(['brand_id'=>$id])->delete();
        if($data){
            return json_encode(['ret'=>'1','res'=>'删除成功']);
        }else{
            return json_encode(['ret'=>0,'res'=>'删除失败']);
        }
    }


    public function brand_upd()
    {
        $id = request()->input('id');
        // dd($id);
        $data = Brand::find($id)->toArray();
        // dd($data);
        return view('admin.brand_upd',['data'=>$data]);
    }


    public function brand_upd_do()
    {
        $brand_id = request()->input('brand_id');
        $brand_name = request()->input('brand_name');
        $brand_desc = request()->input('brand_desc');
        // dd($brand_desc);
        $data = Brand::where(['brand_id' => $brand_id])->update(['brand_name' => $brand_name, 'brand_desc' => $brand_desc]);
        // dd($data);
        if ($data) {
            return json_encode(['ret' => 1, 'res' => '修改成功']);
        } else {
            return json_encode(['ret' => 2, 'res' => '修改失败']);
        }
    }
    /**
     * @ content  分类列表
     */
    public function category_add_do()
    {
        $category_name = request()->input();
        if (!$category_name){
            echo json_encode(['message'=>'请输入值','code'=>'1','data'=>null]);die;
        }
       $res = Category::insert($category_name);
        if ($res){
            echo json_encode(['message'=> '添加成功','code'=>2,'data'=>$res]);die;
        }else{
            echo json_encode(['message'=> '添加失败','code'=>1,'data'=>$res]);die;
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @centent   分类列表
     */
    public function category_list()
    {
        $data = Category::all()->toArray();
        return view('admin.category_list',['data'=>$data]);
    }

    /**
     * @centent 分类删除
     */
    public function category_del()
    {
        $category_id = \request()->input('category_id');
        $res = Category::where(['category_id'=>$category_id])->delete();
        if ($res){
            echo json_encode(['message'=> '删除成功','code'=>2,'data'=>$res]);die;
        }else{
            echo json_encode(['message'=> '删除失败','code'=>1,'data'=>$res]);die;
        }
    }

    /**
     * @centent 分类修改
     */
    public function category_update()
    {
        $category_name = \request()->input('category_name');
        $category_id = \request()->input('category_id');
        $c = Category::find($category_id);
        $c->category_name = $category_name;
        $res = $c->save();
        if ($res){
            echo json_encode(['message'=> '修改成功','code'=>2,'data'=>$res]);die;
        }else{
            echo json_encode(['message'=> '修改失败','code'=>1,'data'=>$res]);die;
        }

    }

    /**
     * @param Request $request
     * @centent  退出当前账号
     */
    public function quit(Request $request)
    {
        // $dd=$request->session()->get('key');
        $dd=$request->session()->forget('admin');
        echo '<script>alert("退出成功 返回登陆页面");window.location.href="/admin/login";</script>';
    }


    //--------------------------------------------------------------------------------------------------------------




    public function admin_add()
    {
        return view('admin.admin_add');
    }

    public function role_add()
    {
        return view('admin.role_add');
    }
}
