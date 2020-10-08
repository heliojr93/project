@extends('layouts.user')
@section('title','Music Random')
@section('content')
    
        <div class='conteudo'>
            @foreach($musics_like as $music)
                <div class='music-lists'>
                    <div class='music-list'>
                        <h5 ><span class='play_icon'>{{$count}}</span> {{$music->music_name}}</h5>
                        <p>{{$music->artist_name}}</p>
                        
                        
                        <input class='file_path' type="hidden" name="filePath" value="{{ secure_asset('storage/music/' . $music->upload_file) }}">
                        <input class='artist_name' type="hidden" name="filePath" value="{{$music->artist_name}}">
                        <input class='music_name' type="hidden" name="filePath" value="{{$music->music_name}}">
                        <input class='number' type="hidden" name="filePath" value="{{$count}}">
                    </div>
                    @if (Auth::user()->is_favorite($music->id))
                        {{-- お気に入りボタンのフォーム --}}
                        {!! Form::open(['route' => ['unfavorite', $music->id], 'method' => 'delete']) !!}
                        {!! Form::button('<i class="fas fa-heart heart_red "></i>', ['class' => "btn", 'type' => 'submit']) !!}
                        {!! Form::close() !!}
                        @else
                        {{-- お気に入り外すボタンのフォーム --}}
                        {!! Form::open(['route' => ['favorite', $music->id]]) !!}
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
                <a href=''><i class='fas fa-backward'></i></a>
                <a style='display:none' id='pauseBtn' href='#'><i class='fa fa-pause-circle'></i></a>
                <a id='playBtn' href='#'><i class='fa fa-play-circle'></i></a>
                <a href=''><i class='fas fa-forward'></i></a>
        </div>
        <div class='player_control_progress'>
            <div class='player_control_progress2'></div>
        </div>
    </div>
    
    
    <audio id="audioplayer">
    
    <script>
    
        // オーディオプレイヤー類オブジェクト
        var audioPlayer = $("#audioplayer").get(0);
        var playBtn = $("#playBtn").get(0);
        var pauseBtn= $("#pauseBtn").get(0);
        var loaded = false;
        var progressiveBar;
        
        // オーディオプレイヤー再生ボタン押下時の処理
        $('#playBtn').on('click', function() {
            if (loaded) {
                audioPlay();
            }
        });
        
        // オーディオプレイヤー一時停止ボタン押下時の処理
        $('#pauseBtn').on('click', function() {
            audioStop();
        });
        
        // 曲リスト押下時の処理
        $('.music-list').on('click', function() {
            // 再生表示をリセット
            resetPlayIcon();
            
            // 再生表示を付与
            $($(this).find('.play_icon').get(0)).html('<i class="fas fa-play"></i>');
            
            // パラメータ取得
            var filePath = $(this).find('.file_path').get(0).value;
            var artistName = $(this).find('.artist_name').get(0).value;
            var musicName = $(this).find('.music_name').get(0).value;
            var number = $(this).find('.number').get(0).value;
            
            playSong(filePath, artistName, musicName, number);
        });
        
        // 曲を設定して再生
        function playSong(filePath, artistName, musicName, number) {
            var player_artist = $("#player_artist").get(0);

            // 曲を読込
            audioPlayer.innerHTML=`<source src="` + filePath + `" types="audio/mp3">`;
            audioPlayer.load();
            
            // 曲情報をセット
            player_artist.innerHTML=
                '<h3>' + artistName + 
                "</br><span class='play_icon'>" + number + '.</span>' +
                '<span>' + musicName  + '</span>' + '</h3>';
            
            audioPlayer.addEventListener('loadedmetadata',function(e) {
                // 再生
                audioPlay();
                loaded = true;
            });
        }
        
        // オーディオ再生
        function audioPlay() {
            audioPlayer.play();
            startProgressiveBar();
            playBtn.style.display='none';
            pauseBtn.style.display='inline';
        }
        
        // オーディオ一時停止
        function audioStop() {
            audioPlayer.pause();
            stopProgressiveBar();
            playBtn.style.display='inline';
            pauseBtn.style.display='none';
        }
        
        // オーディオが曲を再生し終わった場合
        audioPlayer.addEventListener("ended", function(){
            // プログレッシブバーをリセット
		    $('.player_control_progress2').css('width','0%');
            // 再生表示をリセット
            resetPlayIcon();
            
            // 曲情報をリセット
            player_artist.innerHTML = '';
            
            playBtn.style.display='inline';
            pauseBtn.style.display='none';
            
            loaded = false;
        }, false);
        
        function resetPlayIcon() {
            $('.music-list').each(function(){
                var number = $(this).find('.number').get(0).value;
                $($(this).find('.play_icon').get(0)).html(number);
            })
        
        }
        
        // プログレッシブバーを動かす
        function startProgressiveBar() {
            
            progressiveBar = setInterval(function() {
                var audioTime = audioPlayer.duration;    
                var currentTime = audioPlayer.currentTime;
                
                var percent = currentTime/audioTime * 100;
                $('.player_control_progress2').css('width', percent + '%');
                
                if (percent >= 100) {
                    stopProgressiveBar();
                }
            }, 1);
        }
        
        // プログレッシブバーを止める
        function stopProgressiveBar() {
            clearInterval(progressiveBar);
        }

    </script>
    
    
    
@section('css')
    
    <link href="{{ secure_asset('css/user/music_listen.css') }}" rel="stylesheet">
    
    
@stop

        
    
@endsection