<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    //以下を追加
    protected $guarded = array('id');
    
    public static $rules = array(
        'artist_name'=>'required',
        'music_name' => 'required',
        'genre' => 'required',
        'upload_file'=>'required|mimes:mp3,mp4',
    );
}
