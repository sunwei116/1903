<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'admin';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="admin_id";
}
