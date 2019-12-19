<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
use App\Model\Category;
use App\Model\Images;
use App\Model\Brand;
use Illuminate\Support\Facades\Storage;


class GoodsController extends Controller
{
    public function goods_add(Request $request)
    {
        $brand=Brand::get();
        $data=Category::get();

        if($request->isMethod('post'))
        {
            $result=$request->all();

        }
       return view('admin.goods.goods_add',compact('data','brand'));
    }

    public function up(Request $request)
    {
        $obj=$request->file('Filedata');
        $ext= $obj->getClientOriginalExtension();//获取扩展名;
        $path= $obj->getRealPath(); //获取路径
        $filename=date('YmdHis',time()).'.'.$ext;
        Storage::disk('public')->put($filename,file_get_contents($path));
        $newPath="/uploads/$filename";
        echo $newPath;
    }
    //商品添加
    public function img_add(Request $request)
    {
        $arr=$request->all();
        //dd($arr);
       
        $re=Goods::insert($arr);

        if($re){
            return json_encode(['ret'=>1,'res'=>'添加成功']);
        }else{
            return json_encode(['ret'=>2,'res'=>'添加失败']);
        }
    }

    public function goods_list()
    {
        $data=Goods::get();
        return view('admin.goods.goods_list',compact('data'));
    }

    public function goods_del(Request $request)
    {
        $g_id=$request->get('goods_id');
        $model=new Goods();
        $res=$model->where('goods_id',$g_id)->delete();
        if($res==1){
            $arr=[
                'error'=>1,
                'result'=>'删除成功'
            ];
            $arr=json_encode($arr);
            return $arr;
        }
    }

    //商品轮播图
    public function images_add(Request $request)
    {
        $obj=$request->file('Filedata');
        $ext= $obj->getClientOriginalExtension();//获取扩展名;
        $path= $obj->getRealPath(); //获取路径
        $filename=date('Y-m-d-H-i-s',time()).'.'.$ext;
        Storage::disk('public')->put($filename,file_get_contents($path));
        $newPath="/uploads/$filename";
        echo $newPath;
    }

    public function images(Request $request)
    {
        $data=Goods::get();

        if($request->isMethod('post'))
        {

            $result=$request->all();
            $res=Images::insert($result);
            if($res)
            {
                $arr=[
                    'error'=>1,
                    'data'=>'添加成功'
                     ];
               return json_encode($arr);
            }else
                {
                $arr=[
                  'error'=>2,
                  'data'=>'添加失败'
                ];
                return json_encode($arr);
                }
        }
        return view('admin.goods.images_add',compact('data'));
    }

    public  function images_show()
    {
        $data=Images::join('goods','img.goods_id','=','goods.goods_id')->paginate(5);
        //dd($data);
        return view('admin.goods.images_show',compact('data'));
    }



}
