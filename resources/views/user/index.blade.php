@extends('layouts.user')
@section('content')
    <div class='genero-wrapper'>
        <div class='container'>
            <div class='heading'>
                <h2>  ジャンルを選ぼう！  </h2>
            </div>
            <div class='generos'>
                <div class='genero'>
                    <div class='genero-icon'>
                        <img src="{{asset('/public/images/j-pop.jpg)}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection