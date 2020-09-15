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
                        <a href='#'>J-POP</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/pop.jpg')}}">
                        <a href='#'>ポップ</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/rock.jpg')}}">
                        <a href='#'>ロック</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/rap.jpg')}}">
                        <a href='#'>ラップ</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/hiphop.jpg')}}">
                        <a href='#'>ヒップホップ</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/classic.jpg')}}">
                        <a href='#'>クラシック</a>
                    </div>
                </div>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('../images/jazz.jpg')}}">
                        <a href='#'>ジャズ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection