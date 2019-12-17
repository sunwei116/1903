<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brand';

    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="brand_id";
}
