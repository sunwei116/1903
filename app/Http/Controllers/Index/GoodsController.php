<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
class GoodsController extends Controller
{
      public function goods_show()
      {
          $data=Goods::get();
          $re=json_encode($data);
          return $re;
      }






}
