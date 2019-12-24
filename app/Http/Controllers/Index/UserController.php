<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Address;
use App\Model\Region;
use App\IndexModel\User;

class UserController extends Controller
{
    //注册


	//分类展示接口
	public function cate()
	{
        User::header();
		$res = Category::get();
		return json_encode(['ret'=>1,'res'=>$res]);
	}

	//四级联动
	public function getregion()
	{
        User::header();
		// $res = Region::get();
		$res = Region::where(['parent_id'=>0])->get();
		// dd($res);
		return json_encode(['ret'=>1,'res'=>$res]);

	}
	//四级联动
	public function getregion_do()
	{
        User::header();
		$parent_id = request()->input('parent_id');
		$res = Region::where(['parent_id'=>$parent_id])->get();
		return json_encode(['ret'=>1,'res'=>$res]);
	}


	public function region_do(){
        User::header();
		$add_name = request()->input('add_name');
		// dd($add_name);
		$add_place = request()->input('add_place');
		$add_tel = request()->input('add_tel');
		$region_id = request()->input('region_id');
		$add_province = request()->input('add_province');
		$add_city = request()->input('add_city');
		$add_contry = request()->input('add_contry');
		$res = Address::insert([
			'add_name'=>$add_name,
			'add_place'=>$add_place,
			'add_tel'=>$add_tel,
			'region_id'=>$region_id,
			'add_province'=>$add_province,
			'add_city'=>$add_city,
			'add_contry'=>$add_contry

		]);
		// dd($res);
		if($res){
			// dd(localStorage_getItem('token'));
			return json_encode(['ret'=>1,'res'=>'添加成功']);
		}else{
			return json_encode(['ret'=>2,'rse'=>'添加失败']);
		}
	}

	//地址列表接口
	public function region_list()
	{
        User::header();
		$data = array();
		// $data = Address::get();
		// dd($data);
		$res = Region::join("address","address.region_id","=","region.region_id")->get()->toarray();
		foreach ($res as $k => $v) {
			$add_province=Region::where('region_id',$v['add_province'])->first(['region_name'])->toarray();
			$res[$k]['add_province']=$add_province['region_name'];
			$add_contry=Region::where('region_id',$v['add_contry'])->first(['region_name'])->toarray();
			$res[$k]['add_contry']=$add_contry['region_name'];
			$add_city=Region::where('region_id',$v['add_city'])->first(['region_name'])->toarray();
			$res[$k]['add_city']=$add_city['region_name'];
		}
		// dd($res);
		// // dd($res[0]['region_id']);
		// $dataInfo = Region::where(['region_id'=>$res[0]['add_contry']])->first()->toarray();
		// // dd($data);
		// $datas = Region::where(['region_id'=>$res[0]['add_contry']])->first()->toarray();
		// // dd($datas);
		// // return json_encode(['ret'=>1,'res'=>$res]);
		// // return json_encode(['ret'=>2,'data'=>$data]);
		// // return json_encode(['ret'=>3,'datas'=>$datas]);

		// $data['success']=true;
		// $data=array(
		// 	'data1'=>$res,
		// 	'data2'=>$dataInfo,
		// 	'data3'=>$datas,
		// );
		// dd($data);
		return json_encode($res,1);

	}
}
