@extends('layouts.user')
@section('content')
    <form action="{{ action('User\UserController@index') }}" method="get"></form>
        
    <input type="checkbox" id="check">
    <label for="check">
        <i class='fas fa-bars' id="btn"></i>
        <i class='fas fa-times' id="cancel"></i>
    </label>
    <div class='sidebar'>
        <header>Music Ramdom</header>
        <ul>
            <li><a class='dash' href='#'><i class='fas fa-headphones'></i>今すぐ聞こう</a></li>
            <li><a class='dash' href='#'><i class='fas fa-splotch'></i>お気に入り</a></li>
            <li><a class='dash' href='#'><i class='fa fa-question-circle'></i>Music-Ramdomについて</a></li>
        </ul>
    </div>
    <section></section>
    
        
@endsection