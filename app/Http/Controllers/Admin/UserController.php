<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function login_do()
    {
        $user_name = request()->input('user_name');
        $password = request()->input('password');
    }

    public function register()
    {
        echo "111";
    }
}
