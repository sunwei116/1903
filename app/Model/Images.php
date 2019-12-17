<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'img';
    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="images_id";
}
