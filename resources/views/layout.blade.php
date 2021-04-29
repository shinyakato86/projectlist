<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <meta name='csrf-token' content='{{ csrf_token() }}'>
    <title>{{ config('app.name') }}</title>
    <meta name="description" content="受注案件登録システムです。">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src='{{ asset("js/app.js") }}' defer></script>
    <script src='{{ asset("js/script.js") }}' defer></script>
</head>
    <body>
    <header class="header">
        <nav class='headerNav navbar navbar-expand-md navbar-dark'>
        <p class="header_logo"><a class='' href={{route('index')}}><img src="{{ asset('images\mainLogo.png') }}"></a></p>

        <div class="" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->


            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="btn mr-3" href="{{ route('login') }}">{{ __('ログイン') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="btn-secondary btn" href="{{ route('register') }}">{{ __('新規登録') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle btn btn-secondary px-3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            ID: {{ Auth::user()->name }}でログイン中 <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="navbarDropdown">
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
                @endguest
            </ul>
        </div>
        </nav>
</header>


            @yield('content')


        <footer class="footer">
            <div class="footer_inner">
            <small class="footer_copy">このページは架空のサービスです。実在の団体・人物とは関係ありません。<br>Copyright© shinya kato</small>
            </div>
        </footer>
    </body>
</html>
