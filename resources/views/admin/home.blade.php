@extends('adminlte::page')

@section('title', 'Music Random-MyProfile')

@section('content_header')
    <h1>音楽をアップロード</h1>
@stop

@section('content')
    <div class='content'>
        @if (count($errors) > 0)
            <ul>
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif
        <div class="form-group row">
            <label class="col-md-2" for="music-name">アーティスト名</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="artist-name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2" for="music-name">曲名</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="music-name">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-2" for="genre">ジャンル</label>
            <div class="col-sm-4">
                <select name='genre'>
                    <option value='-'>ー</option>
                    <option value='selection-list' disabled>選択リスト</option>
                    <option value='j-pop'>J-POP</option>
                    <option value='rock'>ロック</option>
                    <option value='rap'>ラップ</option>
                    <option value='rip-rop'>ヒップホップ</option>
                    <option value='classic'>クラシック</option>
                    <option value='jazz'>ジャズ</option>
                </select>
            </div>
        </div>
        <div class='music-upload'>
            <form method='post' action="{{action('Admin\MyProfileController@action_upload')}}">
                <input type='file' name='upload-file'><br><br>
                <input type='submit' value='送信'>
            </form>
        </div>
    </div>
        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/resources/sass/admin/home.scss">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop