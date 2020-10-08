<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Music;
use App\User;

class FavoritesController extends Controller
{
    /**
    * 音楽お気に入り登録するアクション。
    */
    public function store($musicId)
    {
        // 音楽をお気に入り登録する
        
        \Auth::user()->favorite($musicId);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    /**
    * 音楽のお気に入り登録を外すアクション。
    */
    public function destroy($musicId)
    {
        // 認証済みユーザ（閲覧者）が、 idのユーザをアンフォローする
        \Auth::user()->unfavorite($musicId);
        // 前のURLへリダイレクトさせる
        return back();
    }
    public function index(Request $request){
        $user =Auth::user();
        $musics=Music::all();
        $music=Music::find($request->id);
        $musics_like=$user->favoritesMusics;
        $count=$musics_like->count();
        
        return view('user.favorites',['user'=>$user,'musics'=>$musics,'music'=>$music,'musics_like'=>$musics_like,'count'=>$count]);
        
    }
}
