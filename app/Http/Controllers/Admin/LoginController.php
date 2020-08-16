<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //以下を追加
    use AuthenticatesUsers;

    protected $redirectTo = 'admin/index';  // ログイン後のリダイレクト先

    public function __construct(Request $request)
    {
        $this->middleware('guest:admin')->except('logout');;
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
