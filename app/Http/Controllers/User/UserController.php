<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Music;
use App\User;


class UserController extends Controller
{
    public function index(Request $request){
        $user=Auth::User();
        //以下を追加
        $cond_title = $request->cond_title;
            if ($cond_title != '') {
                // 検索されたら検索結果を取得する
                $musics_data = Music::where('music_name'||'artist_name', $cond_title)->get();
            } else {
                // それ以外はすべてのニュースを取得する
                $musics_data = Music::all();
    }
        
        return view('user.index',['musics_data'=>$musics_data,'cond_title'=>$cond_title, 'user'=>$user]);
        
    }
    public function profile(Request $request){
        $form=$request->all();
        $user =Auth::user();
        //データを保存する
        //$user->fill($form);
        //音楽保存
        if (isset($form['profile_image'])) {
            $path = $request->file('profile_image')->store('public/profile_image');
            $user->profile_image = basename($path);
        }else {
          $user->profile_image = null;
        }
        // フォームから送信されてきた_tokenを削除する
        unset($form['_token']);
        // フォームから送信されてきたimageを削除する
        unset($form['profile_image']);
        $user->fill($form);
        $user->save();
        return redirect('user/index');
    }
    public function music_listen(Request $request){
        $user =Auth::user();
        $musics=Music::all();
        $music=Music::find($request->id);
        
        return view('user.music_listen',['user'=>$user,'musics'=>$musics,'music'=>$music]);
    }
    
}