@extends('layouts.user')
@section('content')
    <div class='conteudo'>
        @for($i=0;$i< count($musics);$i++)
            <div class='music-list'>
                <table border='1' class='music_table'>
                    <tr>
                        <td>{{$i+1}}|{{$musics[$i]->music_name}}</td>
                    </tr>
                </table>
                <audio id='audioplayer' src="../storage/music/{{$musics[$i]->upload_file}}"  controls ></audio>
                
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
        
        pauseBtn.addEventListener('click',(i)=>{
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
        
    </script>
@section('css')
    <link href="{{ secure_asset('css/user/music_listen.css') }}" rel="stylesheet">
    
@stop

        
    
@endsection