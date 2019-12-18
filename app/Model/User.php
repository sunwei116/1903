<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="user_id";
}
