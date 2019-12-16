<?php


namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    //是否更新时间戳 false
    public $timestamps=false;
    //主键
    protected $primaryKey="category_id";
}