<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin_role extends Model
{
    protected $table = 'admin_role';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="admin_id";
}
