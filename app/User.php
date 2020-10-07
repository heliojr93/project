<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Music;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','profile_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
    * このユーザがお気に入りしてる1以上のmusic。
    */
    public function favoritesMusics()
    {
        return $this->belongsToMany(Music::class, 'favorites', 'user_id', 'music_id')->withTimestamps();
    }
    
    /**
    * $music_idで指定されたmusicをお気に入り登録する。
    *
    * @param int $userId
    * @return bool
    */
    public function favorite($musicId)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_favorite($musicId);
        if ($exist) {
            // すでにお気に入り登録していればお気に入り登録を外す
             
            return false;
        } else {
            // お気に入り登録していなければお気に入り登録をする
            $this->favoritesMusics()->attach($musicId);
            return true;
        }
     
    }
    /**
    * $music_idで指定されたmusicをお気に入り登録を外す。
    *
    * @param int $userId
    * @return bool
    */
    public function unfavorite($musicId)
    {
        // すでにお気に入りしているかの確認
        $exist = $this->is_favorite($musicId);
        if ($exist) {
        // すでにお気に入りしていればフォローを外す
        $this->favoritesMusics()->detach($musicId);
        return true;
        } else {
        // 未フォローであれば何もしない
        return false;
        }
    }
    /**
    * 指定された $musicIdの音楽をユーザがお気に入り登録してるか調べる。
    *
    * @param int $musicId
    * @return bool
    */
    public function is_favorite($musicId)
    {
        //お気に入りユーザの中に $musicIdのものが存在するか
        //dd($this->favoritesMusics()->where('music_id',$musicId)->get());
        //$favorito=$this->favoritesMusics();
        //dd($favorito->all());
        return $this->favoritesMusics()->where('music_id', $musicId)->exists();
    }

}