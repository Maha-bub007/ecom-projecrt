<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController extends Controller
{
    public function login()
    {
        return \view('backend.login');
    }
    public function login_check(Request $admin_login)
    {
        $email = $admin_login->email;
        $password = $admin_login->password;
        if (Auth::attempt(['email' => $email, 'password' => $password, 'role'=> 1])) {
            return redirect('/admin/Dashboard');
        } else {
            return redirect()->back();
        }
    }
    public function dashboard()
    {
        if (Auth::user()) {
            if (Auth::user()->role == 1) {
                return view('backend.admin.dashboard');
            } else {
                return redirect('/admin/login');
            }
        }
    }
}
