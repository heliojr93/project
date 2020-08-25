<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Music;

class MyProfileController extends Controller
{
    //以下を追加
    public function index(){
        return view('admin.home');
    }
    
    
    public function create(Request $request){
        //validationを行う
        $this->validate($request,Music::$rules);
        $music=new Music;
        $form=$request->all();
        //データを保存する
        $music->fill($form);
         //音楽保存
        $path = $request->file('upload_file')->store('public/music');
        $music->upload_file = basename($path);
        $music->save();
       
    
        return redirect('admin/home');
    }
}
