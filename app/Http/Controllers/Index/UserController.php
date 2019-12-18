<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class UserController extends Controller
{
    //注册


	//分类展示接口
	public function cate()
	{
		$res = Category::get();
		return json_encode(['ret'=>1,'res'=>$res]);
	}
}
