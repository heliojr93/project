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
         {{-- Laravel標準で用意されているJavascriptを読み込みます --}}
        <script src="{{ secure_asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込みます --}}
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
        {{-- この章の後半で作成するCSSを読み込みます --}}
        <link href="{{ secure_asset('css/home.css') }}" rel="stylesheet">
        
        
    </head>
    <body>
        
        <div class='header'>
            
            <div class='header-logo'>Musics <span>Random</span></div>
            <div class='header-list'>
                <ul>
                    <li>
                        <a href="#" class="logar">Musics <span>Random</span>とは</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="logar">登録する</a>
                    </li>
                    <li>
                        @guest
                            <a class="logar" href="{{ route('login') }}">ログイン</a>
                        {{-- ログインしていたらユーザー名とログアウトボタンを表示 --}}
                        @else
                        <a class="logar" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">ログアウト
                                        
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endguest

                    </li>
                </ul>
            </div>
        </div>
        <main>
            {{-- コンテンツをここに入れるため、@yieldで空けておきます。 --}}
            @yield('content')
        </main>

    </body>
</html>