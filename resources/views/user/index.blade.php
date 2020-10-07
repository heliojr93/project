@extends('layouts.user')
@section('title','Music Random')
@section('content')
    <div class='genero-wrapper'>
        <div class='container'>
            <div class='heading'>
                <h2>  ジャンルを選ぼう！  </h2>
            </div>
            <div class='generos'>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/j-pop.jpg')}}">
                        <a href="{{action('User\GenreController@jpop', ["genre"=>'j-pop'])}}">J-POP</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/pop.jpg')}}">
                        <a href="{{action('User\GenreController@pop', ["genre"=>'pop'])}}">ポップ</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/rock.jpg')}}">
                        <a href="{{action('User\GenreController@rock', ["genre"=>'rock'])}}">ロック</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/rap.jpg')}}">
                        <a href="{{action('User\GenreController@rap', ["genre"=>'rap'])}}">ラップ</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/hiphop.jpg')}}">
                        <a href="{{action('User\GenreController@riprop', ["genre"=>'rip-rop'])}}">ヒップホップ</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/classic.jpg')}}">
                        <a href="{{action('User\GenreController@classic', ["genre"=>'classic'])}}">クラシック</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/jazz.jpg')}}">
                        <a href="{{action('User\GenreController@jazz', ["genre"=>'jazz'])}}">ジャズ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection