<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
use App\Model\Category;
use Illuminate\Support\Facades\Storage;

class GoodsController extends Controller
{
    public function goods_add(Request $request)
    {

        $data=Category::get();

        if($request->isMethod('post'))
        {
            $result=$request->all();

        }
       return view('admin.goods.goods_add',compact('data'));
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
        dd($re);
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
    public function images()
    {
        
    }
}
