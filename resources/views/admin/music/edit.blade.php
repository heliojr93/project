@extends('adminlte::page')

@section('title', 'Music Random-MyProfile')

@section('content_header')
    <h1>編集画面</h1>
@stop

@section('content')
    <div class='music_upload'>
            <form method='post' action="{{action('Admin\MyProfileController@update')}}" enctype="multipart/form-data"><div class='content'>
                @if (count($errors) > 0)
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                @endif
                <div class="form-group row">
                    <label class="col-md-2" for="music_name">アーティスト名</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="artist_name" value="{{ $musics_form->artist_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="music-name">曲名</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="music_name" value="{{ $musics_form->music_name }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-2" for="genre">ジャンル</label>
                    <div class="col-sm-4">
                        <select name='genre' value="{{ $musics_form->genre }}" >
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
                <input type="hidden" name="id" value="{{ $musics_form->id }}">        
                <input type='file' name='upload_file' value="{{ $musics_form->upload_file }}" ><br><br>
                {{ csrf_field() }}
                <input type='submit' value='更新'>
            </form>
        </div>
    </div>
        
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="{{ secure_asset('css/adminlte.css') }}" rel="stylesheet">

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop