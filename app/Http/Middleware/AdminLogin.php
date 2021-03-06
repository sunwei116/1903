<?php

namespace App\Http\Middleware;

use App\Model\Admin;
use App\Model\Right;
use App\Model\Role_right;
use Closure;

class AdminLogin {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (empty(session('admin'))) {
			echo '<script>alert("请先登陆");window.location.href="/admin/login";</script>';exit;
		}
		//获取管理员id
		$admin_id = session('admin');
		$admin = Admin::find($admin_id)->toArray();
		if ($admin['is_admin'] != 1) {
			$admin = Admin::join('admin_role', 'admin.admin_id', '=', 'admin_role.admin_id')->where(['admin.admin_id' => $admin_id])->first();

			$role_right = Role_right::where('role_id', '=', $admin['role_id'])->get();
			// dd($role_right);
			$data = "";
			foreach ($role_right as $k => $v) {
				// dd($v['right_id']);die;
				// $http = $request->server('HTTP_HOST');
				$url = $request->server('REQUEST_URI');
				// $header = 'http://' . $http . $url;
				$right = Right::where(['right_id' => $v['right_id']])->where(['url' => $url])->first();
				// var_dump($right);
				$data .= $right;
			}
			if (empty($data)) {
				echo "<script>alert('你的权限不够！联系管理员');location.href='/admin/login';</script>";
			}

		}

		$admin = Admin::join('admin_role', 'admin.admin_id', '=', 'admin_role.admin_id')->where(['admin.admin_id' => $admin])->first();
		$Role = Role_right::where('role_id', '=', $admin['role_id'])->get()->toArray();
		return $next($request);
	}
}
