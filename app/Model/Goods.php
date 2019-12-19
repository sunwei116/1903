<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Images;

class Goods extends Model
{
    protected $table = 'goods';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="goods_id";

    public static function get_Goods_all()
    {
        $data = self::all()->toArray();
        return $data;
    }

    /**
     * @param $goods_id
     * @return mixed\
     * @centent 商品详情
     */
    public static function goods_desc($goods_id)
    {
       $data = self::find($goods_id);
        if ($data == null) {
            echo json_encode(['code'=>2,'msg'=>'暂无该商品','data'=>$data]);exit;
        }
        $data = $data->toArray();
        //获取商品轮播图
        $imgs = self::get_goods_imgs($goods_id);
//        dd($imgs);
        $str = '';
        foreach ($imgs as $k => $v) {
            $str.='|'.$v['img'];
        }
        $str = trim($str,'|');
        $arr = explode('|',$str);
        $data['imgs']=$arr;
       return $data;
    }

    public static function get_goods_imgs($goods_id)
    {

        $data = Images::where(['goods_id'=>$goods_id])->get();
        if (empty($data)) {
            echo json_encode(['code'=>2,'msg'=>'暂无该商品轮播图片','data'=>$data]);exit;
        }
        $imgs = $data->toArray();
        return $imgs;
    }


    public static function json_success($code=1, $msg='操作成功',$data=null)
    {
        echo json_encode(['code'=>$code,'msg'=>$msg,'data'=>$data]);exit;
    }
    public static function json_error($code=2, $msg='操作失败',$data=null)
    {
        echo json_encode(['code'=>$code,'msg'=>$msg,'data'=>$data]);exit;
    }
}
