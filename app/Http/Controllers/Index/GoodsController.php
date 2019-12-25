<?php

namespace App\Http\Controllers\Index;

use App\IndexModel\User;
use App\Model\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Goods;
use App\IndexModel\Cart;
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
//          User::header();
            //dd(222);

          //获取当前商品id
          
          $goods_id=$request->get('goods_id');
          $token=$request->get('token');
          $userinfo=User::where('token',$token)->first()->toArray();
          $user_id=$userinfo['user_id'];
        //  dd($user_id);
          if(!empty($goods_id)){
              if($goods_id){
                    $goodsInfo=Goods::where('goods_id',$goods_id)->get()->toArray();
                    $goods_stock=$goodsInfo[0]['goods_stock'];
                       if($goodsInfo==null){
                          $arr=[
                              'code'=>2,
                              'msg'=>'商品已经下架',
                          ];
                          return json_encode($arr);
                      }else{
                           if($goods_stock <= 0){
                         $arr=[
                             'code'=>2,
                              'msg'=>'商品库存不足',
                         ];
                         return \json_encode($arr);
                           }else{
                             $info=Cart::where('user_id',$user_id)->where('goods_id',$goods_id)->first();
                              if($info){
                                  $res=Cart::increment('goods_num');
                                    Goods::json_success(1,'加入购物车成功');
                                }else{
                                    $go=Goods::where('goods_id',$goods_id)->first()->toArray();
                                    $array=[
                                        'goods_img'=>$go['goods_img'],
                                        'goods_name'=>$go['goods_name'],
                                        'user_id'=>$userinfo['user_id'],
                                        'market_price'=>$go['market_price'],
                                        'goods_id'=>$go['goods_id'],
                                    ];
                                    $res=Cart::insert($array);
                                    Goods::json_success(1,'添加购物车成功');
                                }
                            }
                      }
              }
            }
    
        }



      public function total(Request $request)
      {
          $token=$request->get('token');
          $userinfo=User::where('token',$token)->first()->toArray();
          $user_id=$userinfo['user_id'];
          $info=Cart::where('user_id',$user_id)->get()->toArray();
        
          $money_total=0;
          foreach($info as $k=>$v)
          {
             
              $total=$v['market_price']*$v['goods_num'];
              $info[$k]['total']=$total;
              $money_total+=$total;
          }
          
          Goods::json_success(1,'调用接口成功',$money_total);
          
      }

      public function cart_list(Request $request)
      {
          $token=$request->get('token');
          $userinfo=User::where('token',$token)->first()->toArray();
          $user_id=$userinfo['user_id'];
          $info=Cart::where('user_id',$user_id)->get();
          Goods::json_success(1,'操作成功',$info); 
      }




}
