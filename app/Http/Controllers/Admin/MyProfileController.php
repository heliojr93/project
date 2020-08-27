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
        //$this->validate($request,Music::$rules);
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
    
    public function music_data(){
        $musics_data=Music::all();
        $error=array();
        return view('admin.music.music_data',[
            'musics_data'=>$musics_data,
            'error'=>$error
            
            ]);
    }
    public function edit(Request $request){
      // Profiles Modelからデータを取得する
      $musics_data = Music::find($request->id);
      if (empty($musics_data)) {
        abort(404);    
      }
      return view('admin.music.edit', ['musics_form' => $musics_data]);
        
    }
}
