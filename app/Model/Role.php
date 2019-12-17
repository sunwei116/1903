<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="role_id";
}
