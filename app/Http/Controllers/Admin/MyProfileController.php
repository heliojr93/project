<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Music;
use App\User;
use Storage;

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
        // $path = $request->file('upload_file')->store('public/music');
        // $music->upload_file = basename($path);
        
        $path = Storage::disk('s3')->putFile('/',$form['upload_file'],'public');
        
        $music->upload_file = $path;
        //$music->upload_file = asename($path);
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
    
    public function update(Request $request){
        
        // Validationをかける
        $this->validate($request, Music::$rules);
        // Music Modelからデータを取得する
        $musics_data = Music::find($request->id);
        // 送信されてきたフォームデータを格納する
        $musics_form = $request->all();
        unset($musics_form['_token']);
    
        // 該当するデ ータを上書きして保存する
        $musics_data->fill($musics_form)->save();
        return redirect('admin/home/music_data');
    }
    
    public function delete(Request $request){
        // 該当するMusic Modelを取得
      $musics_data = Music::find($request->id);
      // 削除する
      $musics_data->delete();
      return redirect('admin/home/music_data');
        
    }
    
    public function user_list(){
        $user_list=User::all();
        $error=array();
        return view('admin.user_list',[
            'user_list'=>$user_list,
            'error'=>$error
            ]);
        
    }
    
    public function delete_user(Request $request){
        // 該当するMusic Modelを取得
      $user_list = User::find($request->id);
      // 削除する
      $user_list->delete();
      return redirect('admin/user_list');
        
    }
    
   
}
