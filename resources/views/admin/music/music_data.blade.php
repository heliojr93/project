@extends('adminlte::page')

@section('title', '曲のデータ一覧')

@section('content_header')
    <h1>曲のデータ一覧</h1>
@stop

@section('content')
    <?php foreach ($error as $value) { ?>
     
    <?php print htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?>
     
    <?php } ?>
    
    
    <table border="1" class='music_table'>
        <tr>
            <th width='10%'>  ID  </th>
            <th width='29%'>  アーティスト名  </th>
            <th width='29%'>  曲名  </th>
            <th width='29%'>  ジャンル  </th>
            <th width='10%'>曲</th>
        </tr>
    @foreach($musics_data as $music)
       <tr>
           <td>{{ $music->id }}</td>
           <td>{{ $music->artist_name }}</td>
           <td>{{ $music->music_name }}</td>
           <td>{{ $music->genre }}</td>
           <td>{{$music->upload_file}}</td>
           <td>
                <div>
                    <a class='edit' href="{{action('Admin\MyProfileController@edit',['id'=>$music->id])}}">編集</a>
                </div>
                <div>
                    <a class='edit' href="{{action('Admin\MyProfileController@delete',['id'=>$music->id])}}">削除</a>
                </div>
            </td>
       </tr>
 
    @endforeach
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ secure_asset('css/music_data.css') }}" rel="stylesheet">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop