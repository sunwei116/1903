<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    protected $table = 'right';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="right_id";
}
