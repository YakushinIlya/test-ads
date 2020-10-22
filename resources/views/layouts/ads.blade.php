<!doctype html>
<html lang="ru" class="h-100">
<head>
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/frontend/media/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/media/css/all.min.css">
    <link rel="stylesheet" href="/frontend/media/css/style.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="d-flex flex-column h-100">

<div class="d-flex flex-column h-100" id="app">
<section class="header">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 header__nav">

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="header__logo navbar-brand" href="{{route('home')}}">
                            <img src="/frontend/media/img/logo.png" class="d-inline-block align-top">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Недвижимость</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Автомобили</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Услуги</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Работа</a>
                                </li>
                            </ul>
                            <span class="navbar-text">
                                <ul class="navbar-nav mr-auto">
                                    @guest
                                        <li class="nav-item">
                                            <a href="{{route('login')}}" class="header__nav-btn-login nav-link"><i class="fa fa-user-check"></i> {{__('Вход')}}</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{route('register')}}" class="header__nav-btn-register nav-link"><i class="fa fa-user-plus"></i> {{__('Регистрация')}}</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a href="{{route('profile')}}" class="header__nav-btn-profile nav-link"><i class="fa fa-user"></i> {{__('Мой профиль')}}</a>
                                        </li>
                                    @endguest
                                </ul>
                            </span>
                        </div>
                    </nav>

                </div>
            </div>
        </div>
    </header>
</section>

@yield('search')

<section class="body">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @yield('content')
            </div>
            <div class="col-md-3">
                @yield('sidebar')
            </div>
        </div>
    </div>
</section>

@yield('footer')
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="/frontend/media/js/bootstrap.min.js"></script>
<script src="/frontend/media/js/bootstrap.bundle.min.js"></script>
<script src="/frontend/media/js/all.min.js"></script>

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</body>
</html>