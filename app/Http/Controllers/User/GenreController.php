<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Music;
use App\User;
use Illuminate\Support\Facades\Auth;

class GenreController extends Controller
{
    //以下を追加
    public function jpop(Request $request){
        //dd($request);
        $music_jpops=Music::where('genre',$request->genre)->get();
        //dd($music_jpops);
        $user =Auth::user();
        $musics=Music::all();
        $music=Music::find($request->id);
        $count=$music_jpops->count();
        
        //dd($count);
        
        return view('user.genre.genre_jpop',['user'=>$user,'musics'=>$musics,'music'=>$music,'music_jpops'=>$music_jpops, 'count'=>$count]);
    }
    public function pop(Request $request){
        //dd($request);
        $music_pops=Music::where('genre',$request->genre)->get();
        //dd($music_jpops);
        $user =Auth::user();
        $musics=Music::all();
        $music=Music::find($request->id);
        $count=$music_pops->count();
        
        //dd($count);
        
        return view('user.genre.genre_pop',['user'=>$user,'musics'=>$musics,'music'=>$music,'music_pops'=>$music_pops, 'count'=>$count]);
    }
    public function rock(Request $request){
        //dd($request);
        $music_rocks=Music::where('genre',$request->genre)->get();
        //dd($music_jpops);
        $user =Auth::user();
        $musics=Music::all();
        $music=Music::find($request->id);
        $count=$music_rocks->count();
        
        //dd($count);
        
        return view('user.genre.genre_rock',['user'=>$user,'musics'=>$musics,'music'=>$music,'music_rocks'=>$music_rocks, 'count'=>$count]);
    }
    public function rap(Request $request){
        //dd($request);
        $music_raps=Music::where('genre',$request->genre)->get();
        //dd($music_jpops);
        $user =Auth::user();
        $musics=Music::all();
        $music=Music::find($request->id);
        $count=$music_raps->count();
        
        //dd($count);
        
        return view('user.genre.genre_rap',['user'=>$user,'musics'=>$musics,'music'=>$music,'music_raps'=>$music_raps, 'count'=>$count]);
    }
    public function riprop(Request $request){
        //dd($request);
        $music_riprops=Music::where('genre',$request->genre)->get();
        //dd($music_jpops);
        $user =Auth::user();
        $musics=Music::all();
        $music=Music::find($request->id);
        $count=$music_riprops->count();
        
        //dd($count);
        
        return view('user.genre.genre_rip-rop',['user'=>$user,'musics'=>$musics,'music'=>$music,'music_riprops'=>$music_riprops, 'count'=>$count]);
    }
    public function classic(Request $request){
        //dd($request);
        $music_classics=Music::where('genre',$request->genre)->get();
        //dd($music_jpops);
        $user =Auth::user();
        $musics=Music::all();
        $music=Music::find($request->id);
        $count=$music_classics->count();
        
        //dd($count);
        
        return view('user.genre.genre_classic',['user'=>$user,'musics'=>$musics,'music'=>$music,'music_classics'=>$music_classics, 'count'=>$count]);
    }
    public function jazz(Request $request){
        //dd($request);
        $music_jazzs=Music::where('genre',$request->genre)->get();
        //dd($music_jpops);
        $user =Auth::user();
        $musics=Music::all();
        $music=Music::find($request->id);
        $count=$music_jazzs->count();
        
        //dd($count);
        
        return view('user.genre.genre_jazz',['user'=>$user,'musics'=>$musics,'music'=>$music,'music_jazzs'=>$music_jazzs, 'count'=>$count]);
    }
}
