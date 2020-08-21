@extends('adminlte::page')

@section('title', 'Music Random-MyProfile')

@section('content_header')
    <h1>音楽をアップロード</h1>
@stop

@section('content')
    <div class='music-upload'>
       <form method='post' action="{{action('Admin\MyProfileController@action_upload}}">
            <imput type='file' name='upload-file'><br><br>
            <imput type='submit' value='送信'>
        </form>
    </div>
        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop