<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
         {{-- 後の章で説明します --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" defer></script>

         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" ></script>
        <!--jqueryの導入-->
        <!--<script　src="https://code.jquery.com/jquery-3.3.1.min.js"　integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>-->
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/user/index.css') }}" rel="stylesheet">
        @yield('css')
        
    </head>
    <body>
        
        <input type="checkbox" id="check">
        <header>
            <label for="check">
                <i class='fas fa-bars' id="sidebar_btn"></i>
            </label>
            <div class='header-logo'>Musics <span class='title'>Random</span></div>
            <div class='header-left'>
                <a class="logar" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                </form>
            </div>
        </header>
        <div class='sidebar'>
            <center>
                
                    <form method='post' action="{{action('User\UserController@profile')}}" enctype='multipart/form-data'>
                        <input type='file' name='profile_image'>
                        @csrf
                        
                        <input type='submit' value='プロフィール画像を編集'>
                        
                    </form>
                
                
                <!--<img class='profile_image' src="neutral_image.png">-->
                <img class='profile_image' src="{{$user->profile_image}}">
                <!--<img class='profile_image' src="{{ asset('storage/profile_image/' .  $user->profile_image)}}">-->
                <h4>{{$user->name}}</h4>
                
            </center>
            <script>
                
            </script>
            <a href="{{action('User\UserController@index')}}" <i class="fas fa-home"></i><span>ホーム</span>
            <a  href="{{action('User\UserController@music_listen')}}"><i class='fas fa-headphones'></i><span>今すぐ聞こう</span></a>
            <a href="{{action('User\FavoritesController@index')}}" <i class="fas fa-heart"></i><span>お気に入り</span>
            <a  href='#'><i class='fa fa-question-circle'></i><span>Music-Ramdomについて</span></a>
        </div>
        <main>
            {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
            @yield('content')
        </main>

    </body>
</html>