<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Goods;
use App\Model\AttrVal;


class Attr extends Model
{
    protected $table = 'attr';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="attr_id";

    public static function get_goods_attr($goods_id)
    {
        $data = self::where('goods_id',$goods_id)->get()->toArray();
        if (empty($data)) {
            Goods::json_error(2,'请联系管理员添加属性');
        }

        $result = array();
        foreach ($data as $key => $val) {
            $tmp = array();
            $attr_id = $val['attr_id'];
            $attr_name = $val['attr_name'];
            $attr_val = AttrVal::where('attr_id',$attr_id)->get()->toArray();
            if(!empty($attr_val)){
                 $tmp['attr_name']=$attr_name;
                 $tmp['data']=$attr_val;
                array_push($result,$tmp);
            }
        }
//    print_r($result);
//    exit;
//        echo json_encode($result);
        return $result;

    }
}
