<?php

namespace App\Http\Controllers\Index;

use App\Model\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
class GoodsController extends Controller
{
      public function goods_show()
      {
          $data=Goods::get();
          $re=json_encode($data);
          echo json_encode(['code' => 1, 'msg' => '调用成功', 'data' => $data]);
      }

      public function images_api()
      {
        $data=Images::join('goods','img.goods_id','=','goods.goods_id')->get()->toArray();
          echo json_encode(['code' => 1, 'msg' => '调用成功', 'data' => $data]);
      }



}
