<?php

namespace App\Http\Controllers\Index;

use App\Http\Controllers\Controller;
use App\IndexModel\Car;
use App\IndexModel\User;
use App\Model\Attr;
use App\Model\Category;
use App\Model\Goods;
use DemeterChain\C;
use Illuminate\Http\Request;

class IndexController extends Controller {

	//前台登录
	public function login(Request $request) {
		User::header();
		if (empty($_POST['user_name']) || empty($_POST['user_pwd'])) {
			echo json_encode(['code' => 2, 'msg' => '请输入账号和密码', 'data' => null]);exit;

		}

		$user_name = $_POST['user_name'];
		$user_pwd = $_POST['user_pwd'];
		return User::login($user_name, $user_pwd);
	}

	/**
	 * @centent 注册
	 */
	public function register() {
		User::header();
		$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : '';
		$user_pwd = isset($_POST['user_pwd']) ? $_POST['user_pwd'] : '';
		$user_phone = isset($_POST['user_phone']) ? $_POST['user_phone'] : '';
		return User::register($user_name, $user_pwd, $user_phone);
	}

	/**
	 * @centent 获取所有商品
	 */
	public function get_goods_all() {
		User::header();
		$data = Goods::get_Goods_all();
		echo json_encode(['code' => 1, 'msg' => '请求成功', 'data' => $data]);
	}

	/**
	 * @centent 商品详情
	 */
	public function goods_desc() {
		User::header();
		//接受商品id
		$goods_id = \request()->input('goods_id');
		if (!isset($goods_id)) {
			Goods::json_error(2, '请选择商品');
		}
		$data = Goods::goods_desc($goods_id);
		Goods::json_success(1, '操作成功', $data);
	}

	public function get_goods_attr() {
		User::header();
		$goods_id = \request()->input('goods_id');
		if (empty($goods_id)) {
			Goods::json_error(2, '请选择商品');
		}
		$data = Attr::get_goods_attr($goods_id);
		Goods::json_success(1, '操作成功', $data);
	}

	/**
	 * @centent 首页分类展示
	 */
	public function category() {
		User::header();
		$cateInfo = Category::get();
		Goods::json_success(1, '操作成功', $cateInfo);

	}

	public function category_goods_list(Request $request) {
		User::header();
		$id = $request->get('category_id');

		$data = Goods::where('category_id', $id)->get();
		Goods::json_success('1', '调用接口成功', $data);
	}
	//加入购物车
	public function add_car() {
		User::header();
		$goods_id = $_POST['goods_id'];
		$goods_name = $_POST['goods_name'];
		$market_price = $_POST['market_price'];
//        $goods_guige = $_POST['goods_guige'];
		$token = $_POST['token'];
		if (empty($token)) {
			Goods::json_error(2, 'token不存在，请先存在');
		}

		Car::insert([
			'goods_id' => $goods_id,
			'goods_name' => $goods_name,
			'market_price' => $market_price,
		]);

	}

}
