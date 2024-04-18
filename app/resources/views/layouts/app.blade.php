<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title><img src="{{ asset('img/freemarket (1).png') }}" alt="freemarket"></title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar bg-body-tertiary" style="background-color: #ffffff;">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="../../../image/freemarket.png" alt="Bootstrap" width="85" height="85">
                </a>
                <ul class="nav justify-content-end">
                    @if(Auth::check())
                        <span class="nav-link">
                          <a href="{{ route('mypage') }}">{{ Auth::user()->name }}</a>
                        </span>
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            ログアウト
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                               
                    @else
                        <a href="{{ route('login') }}" class="nav-link" >ログイン</a>
                         
                        <a href="{{ route('register') }}" class="nav-link" >新規登録</a>
                    @endif
                </ul>
           </div>
           
       </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
