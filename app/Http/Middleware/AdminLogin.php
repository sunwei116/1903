<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\Admin_role;
use App\Model\Admin;

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
        return $next($request);


    }
}
