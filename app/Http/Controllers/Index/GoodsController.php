<?php

namespace App\Http\Controllers\Index;

use App\IndexModel\User;
use App\Model\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class GoodsController extends Controller
{
      public function goods_show()
      {
          User::header();
          $data=Goods::get();
          $re=json_encode($data);
          echo json_encode(['code' => 1, 'msg' => '调用成功', 'data' => $data]);
      }

      public function images_api()
      {
          User::header();
        $data=Images::join('goods','img.goods_id','=','goods.goods_id')->get()->toArray();
          echo json_encode(['code' => 1, 'msg' => '调用成功', 'data' => $data]);
      }

      public function cart_add(Request $request)
      {
          User::header();
          //获取当前商品id
          $goods_id=$request->get('goods_id');


      }



}
