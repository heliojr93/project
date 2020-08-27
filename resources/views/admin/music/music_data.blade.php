@extends('adminlte::page')

@section('title', '曲のデータ一覧')

@section('content_header')
    <h1>曲のデータ一覧</h1>
@stop

@section('content')
    <?php foreach ($error as $value) { ?>
     
    <?php print htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?>
     
    <?php } ?>
    
    
    <table border="1">
        <tr>
            <th>  ID  </th>
            <th>  アーティスト名  </th>
            <th>  曲名  </th>
            <th>  ジャンル  </th>
        </tr>
    @foreach($musics_data as $music)
       <tr>
           <td>{{ $music->id }}</td>
           <td>{{ $music->artist_name }}</td>
           <td>{{ $music->music_name }}</td>
           <td>{{ $music->genre }}</td>
           <td>
                <div>
                    <a href="{{action('Admin\MyProfileController@edit',['id'=>$music->id])}}">編集</a>
                </div>
            </td>
       </tr>
 
    @endforeach
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop