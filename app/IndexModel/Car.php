<?php

namespace App\Indexmodel;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = 'car';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="car_id";
}
