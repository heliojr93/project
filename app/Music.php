<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    //以下を追加
    protected $guarded = array('id');
    
    public static $rules = array(
        'artist-name'=>'required',
        'music-name' => 'required',
        'genre' => 'required',
        'upload-file'=>'required',
    );
}
