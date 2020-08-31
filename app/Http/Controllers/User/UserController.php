<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Music;

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
}
