@extends('adminlte::page')

@section('title', '曲のデータ一覧')

@section('content_header')
    <h1>曲のデータ一覧</h1>
@stop

@section('content')
    <?php foreach ($error as $value) { ?>
     
    <?php print htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?>
     
    <?php } ?>
    
    
 
    @foreach($musics_data as $music)
        <tr>
            <th>  ID  </th>
            <td>{{ $music->id }}</td>
            <th>  アーティスト名  </th>
            <td> {{ $music->artist_name }}</td>
            <th>  曲名  </th>
            <td>{{ $music->genre }}</td>
        </tr>
        
       
 
    @endforeach
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop