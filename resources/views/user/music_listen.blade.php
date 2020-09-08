@extends('layouts.user')
@section('content')
    @for($i=0;$i< count($musics);$i++)
        <div class='music-list'>
            <table border='1' class='music_table'>
                <tr>
                    <td>{{$i+1}}|{{$musics[$i]->music_name}}</td>
                </tr>
            </table>
        </div>
    
    @endfor
@section('css)
    <link href="{{ secure_asset('css/user/music_listen.css') }}" rel="stylesheet">
@stop

        
    
@endsection