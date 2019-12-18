<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'goods';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="goods_id";

    public static function getGoods()
    {
        $data = self::all()->toArray();
        return $data;
    }
}
