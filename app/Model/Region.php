<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="region_id";
}
