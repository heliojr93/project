@extends('layouts.user')
@section('title','Music Random')
@section('content')
    <div class='conteudo'>
        @for($i=0;$i< count($musics);$i++)
            <div class='music-lists'>
                <div class='music-list'>
                    <h5 ><span class='play_icon'>{{$i+1}}</span> {{$musics[$i]->music_name}}</h5>
                    <p>{{$musics[$i]->artist_name}}</p>
                    
                    
                    <!--<input class='file_path' type="hidden" name="filePath" value="{{ secure_asset('storage/music/' . $musics[$i]->upload_file) }}">-->
                    <!--<input class='file_path' type="hidden" name="filePath" value="{{'https://projecthelio.s3.us-east-2.amazonaws.com/' . $musics[$i]->upload_file }}">-->
                    <input class='file_path' type="hidden" name="filePath" value="{{$musics[$i]->upload_file }}">
                    <input class='artist_name' type="hidden" name="filePath" value="{{$musics[$i]->artist_name}}">
                    <input class='music_name' type="hidden" name="filePath" value="{{$musics[$i]->music_name}}">
                    <input class='number' type="hidden" name="filePath" value="{{$i+1}}">
                </div>
                @if (Auth::user()->is_favorite($musics[$i]->id))
                        {{-- お気に入りボタンのフォーム --}}
                        {!! Form::open(['route' => ['unfavorite', $musics[$i]->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="fas fa-heart heart_red "></i>', ['class' => "btn", 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                        @else
                        {{-- お気に入り外すボタンのフォーム --}}
                        {!! Form::open(['route' => ['favorite', $musics[$i]->id]]) !!}
                        {!! Form::button('<i class="far fa-heart heart_red"></i>', ['class' => "btn", 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                @endif
            </div>
        @endfor
    </div>
    
    <div class='player'>
        <div id ='player_artist'>
            <h1 class='kuhaku'>テスト</h1>
        </div>
        <div class='player_control'>
            <div class='player_control_buttoms'>
                <a href='#' id='backward'><i class='fas fa-backward'></i></a>
                <a style='display:none' id='pauseBtn' href='#'><i class='fa fa-pause-circle'></i></a>
                <a id='playBtn' href='#'><i class='fa fa-play-circle'></i></a>
                <a href='#' id='forward'><i class='fas fa-forward'></i></a>
        </div>
        <span class='range_count'></span>
        <div class='player_control_progress'>
            <input type='range' step="1" min='0' max='0'class='player_control_progress2'>
            <!--<div class='player_control_progress2'></div>-->
        </div>
    </div>
    
    
    <audio id="audioplayer">
    
    <script src="{{secure_asset('/js/music_play.js')}}"></script>
    <script src="{{secure_asset('/js/fix.js')}}"></script>
    
    
@section('css')
    
    <link href="{{ secure_asset('css/user/music_listen.css') }}" rel="stylesheet">
    
    
@stop

        
    
@endsection