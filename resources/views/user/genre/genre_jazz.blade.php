@extends('layouts.user')
@section('title','Music Random')
@section('content')
    
    <div class='conteudo'>
        @foreach($music_jazzs as $music_genre)
            <div class='music-lists'>
                <div class='music-list'>
                    <h5 ><span class='play_icon'>{{$count}}</span> {{$music_genre->music_name}}</h5>
                    
                    <p>{{$music_genre->artist_name}}</p>
                    
                    <!--<input class='file_path' type="hidden" name="filePath" value="{{ secure_asset('storage/music/' . $music_genre->upload_file) }}">-->
                    <input class='file_path' type="hidden" name="filePath" value="{{$music_genre->upload_file }}">
                    <input class='artist_name' type="hidden" name="filePath" value="{{$music_genre->artist_name}}">
                    <input class='music_name' type="hidden" name="filePath" value="{{$music_genre->music_name}}">
                    <input class='number' type="hidden" name="filePath" value="{{$count}}">
                </div>
                @if (Auth::user()->is_favorite($music_genre->id))
                        {{-- お気に入りボタンのフォーム --}}
                        {!! Form::open(['route' => ['unfavorite', $music_genre->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="fas fa-heart heart_red"></i>', ['class' => "btn", 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                        @else
                        {{-- お気に入り外すボタンのフォーム --}}
                        {!! Form::open(['route' => ['favorite', $music_genre->id]]) !!}
                        {!! Form::button('<i class="far fa-heart heart_red"></i>', ['class' => "btn", 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                @endif
            </div>
        @endforeach
    </div>
    
    <div class='player'>
        <div id ='player_artist'>
            
        </div>
        <div class='player_control'>
            <div class='player_control_buttoms'>
                <a href='#' id='backward'><i class='fas fa-backward'></i></a>
                <a style='display:none' id='pauseBtn' href='#'><i class='fa fa-pause-circle'></i></a>
                <a id='playBtn' href='#'><i class='fa fa-play-circle'></i></a>
                <a href='#' id='forward'><i class='fas fa-forward'></i></a>
        </div>
        <div class='player_control_progress'>
            <div class='player_control_progress2'></div>
        </div>
    </div>
    
    
    <audio id="audioplayer">
    
    <script src="{{secure_asset('/js/music_play.js')}}"></script>
    <script src="{{secure_asset('/js/fix.js')}}"></script>
    
    
    
@section('css')
    
    <link href="{{ secure_asset('css/user/music_listen.css') }}" rel="stylesheet">
    
    
@stop

        
    
@endsection