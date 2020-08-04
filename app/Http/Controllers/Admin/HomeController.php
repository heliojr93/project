<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //以下を追加
    public function add(){
        return view('admin.home');
    }
    public function create(){
        return redirect('admin/home');
    }
    
}
