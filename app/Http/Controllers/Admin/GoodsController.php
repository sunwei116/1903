<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
class GoodsController extends Controller
{
    public function goods_add(Request $request)
    {


        if($request->isMethod('post'))
        {

        }
       return view('admin.goods.goods_add');
    }
}
