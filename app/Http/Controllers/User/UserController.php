<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Music;
use App\User;

class UserController extends Controller
{
    public function index(Request $request){
    //以下を追加
        $cond_title = $request->cond_title;
            if ($cond_title != '') {
                // 検索されたら検索結果を取得する
                $musics_data = Music::where('music_name'||'artist_name', $cond_title)->get();
            } else {
                // それ以外はすべてのニュースを取得する
                $musics_data = Music::all();
    }
        
        return view('user.index',['musics_data'=>$musics_data,'cond_title'=>$cond_title]);
        
    }
    public function profile(Request $request){
       $user=new User;
        $form=$request->all();
        //データを保存する
        $user->fill($form);
         //音楽保存
        $path = $request->file('profile_image')->store('public/profile_image');
        $music->profile_image = basename($path);
        $music->save();
    }
    
}