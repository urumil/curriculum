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
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
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
                        <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{ route('mypage', ['id' => Auth::user()->id]) }}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('mypage', ['id' => Auth::user()->id]) }}">
                                        {{ __('マイページ') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('ログアウト') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>  
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

    <script>
    console.log('読み込み');
    var like = $('.js-like-toggle');
    console.log(like);
    var likeSaleId;
    console.log('読み込み2');
    like.on('click', function() {
      console.log('クリック');
      var $this = $(this);
      likeSaleId = $this.data('postid');
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/ajaxlike',
        type: 'POST',
        data: {
          'sales_id': likeSaleId
        },
      })
      .done(function(data) {
        console.log('チェック');
        $this.toggleClass('loved');
        $this.next('.likesCount').html(data.saleLikesCount);
      })
      .fail(function(data, xhr, err) {
        console.log('エラー');
        console.log(err);
        console.log(xhr);
      });
      return false;
    });
</script>

</body>
</html>
