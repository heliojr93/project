<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;




class LoginController extends Controller
{
    //以下を追加
    use AuthenticatesUsers;

    protected $redirectTo = 'admin/home';  // ログイン後のリダイレクト先

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');;
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        
        return redirect('/admin/login');
    }
    public function showLoginForm()
    {
        return view('admin.login');
    }
}

