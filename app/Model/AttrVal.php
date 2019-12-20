<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Goods;

class AttrVal extends Model
{
    protected $table = 'attr_val';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="attr_val_id";

    public static function get_attr_val($goods_id)
    {
        $data = self::where('goods_id',$goods_id)->get();
        if (empty($data)) {
            Goods::json_error('2','该商品下暂无属性值');
        }
        $attr_val = $data->toArray();
        return $attr_val;
    }
}
