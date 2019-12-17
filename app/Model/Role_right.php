<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Role_right extends Model
{
    protected $table = 'role_right';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="role_right_id";
}
