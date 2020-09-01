@extends('adminlte::page')

@section('title', 'ユーザ管理')

@section('content_header')
    <h1>ユーザ管理</h1>
@stop

@section('content')
    <?php foreach ($error as $value) { ?>
     
    <?php print htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); ?>
     
    <?php } ?>
    
    
    <table border="1" class='music_table'>
        <tr>
            <th width='10%'>  ID  </th>
            <th width='28%'>  ユーザー名  </th>
            <th width='28%'>  メール  </th>
            <th width='28%'>  パスワード  </th>
        </tr>
    @foreach($user_list as $user)
       <tr>
           <td>{{ $user->id }}</td>
           <td>{{ $user->name }}</td>
           <td>{{ $user->email }}</td>
           <td>{{ $user->password}}</td>
           <td>
               <div>
                    <a class='edit' href="{{action('Admin\MyProfileController@delete_user',['id'=>$user->id])}}">削除</a>
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