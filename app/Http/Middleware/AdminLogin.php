<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Admin_role;
use App\Model\Admin;
use App\Model\Right;
use App\Model\Role_right;
class AdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(empty(session('admin'))){
            echo '<script>alert("请先登陆");window.location.href="/admin/login";</script>';exit;
        }
        $admin_id = session('admin');
        $admin = Admin::find($admin_id)->toArray();
//        dd($admin_id);
        $admin=Admin::join('admin_role','admin.admin_id','=','admin_role.admin_id')->where(['admin.admin_id'=>$admin])->first();
        dd($admin);
        $Role=Role_right::where('role_id','=',$admin['role_id'])->get()->toArray();
        dd($Role);
       // dd($admin);
        return $next($request);


    }
}
