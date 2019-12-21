<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="address_id";
}
