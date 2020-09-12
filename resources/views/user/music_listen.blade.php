@extends('layouts.user')
@section('content')
    <div class='conteudo'>
        @for($i=0;$i< count($musics);$i++)
            <div class='music-lists'>
                <div class='music-list music_list_hover'>
                    <h5><span class='play_icon'><i class="fas fa-play"></i></span>{{$i+1}}   {{$musics[$i]->music_name}}</h5>
                    <p>{{$musics[$i]->artist_name}}</p>
                    <audio id='audioplayer' src="../storage/music/{{$musics[$i]->upload_file}}"  controls ></audio>
                </div>
        @endfor
    </div>
    
    <div class='player'>
        <div class='player_artist'>
            
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
    
    
    
    <script>
        var audioPlayer=document.getElementById('audioplayer');
        var loaded=false;
        var playBtn=document.getElementById('playBtn');
        var pauseBtn=document.getElementById('pauseBtn');
        
        pauseBtn.addEventListener('click',(e)=>{
            e.preventDefault();
            
            playBtn.style.display='inline';
            pauseBtn.style.display='none';
            return false;
        });
        
        const playSong=(file)=>{
            if(loaded == false){
                audioPlayer.innerHTML=`<source src="`+file+`" types="audio/mp3">`;
                loaded=true;
            }
            audioPlayer.play();
            
            playBtn.style.display='none';
            pauseBtn.style.display='inline';
        }
        
        document.querySelectorAll('music-list').foreach(item =>{
            item.addEventListener('click',event=>{
                alert('clicado');
            })
        });
        
    </script>
    <script>
    /* global $*/
        $(function(){
            $('.music_list_hover').hover(
                function(){
                    $(this).find('.play_icon').addClass('.play_icon_active');
                },
                function(){
                   $(this).find('.play_icon').removeClass('.play_icon_active');
                }
                );
            
        });
    </script>
@section('css')
    <link href="{{ secure_asset('css/user/music_listen.css') }}" rel="stylesheet">
    
@stop

        
    
@endsection