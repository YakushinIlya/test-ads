<!doctype html>
<html lang="ru" class="h-100">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/frontend/media/img/favicon16.png" />
    <link rel="apple-touch-icon" type="image/png" href="/frontend/media/img/favicon57.png" />
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.svg">
    <script src="https://cdn.tiny.cloud/1/35fwwbnhirflx3s8m4jg0atfen3af8rg5u6oa6u126lalwut/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link rel="stylesheet" href="/frontend/media/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/media/css/all.min.css">
    <link rel="stylesheet" href="/frontend/media/css/style.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2YK293ZVK9"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-2YK293ZVK9');
    </script>

    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(70063012, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>

    <noscript>
        <div>
            <img src="https://mc.yandex.ru/watch/70063012" style="position:absolute; left:-9999px;" alt="yandex metrika" />
        </div>
    </noscript>

    <!-- /Yandex.Metrika counter -->

    <script data-ad-client="ca-pub-6989231873707017" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body class="d-flex flex-column h-100">


<div class="d-flex flex-column h-100" id="app">
<section class="header pl-2 pr-2 p-md-0">
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12 header__nav">

                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="header__logo navbar-brand" href="{{route('home')}}">
                            <img src="/frontend/media/img/logo.png" alt="@yield('title')" class="d-inline-block align-top">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarText">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('adsSell')}}">Продают авто</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('adsBuy')}}">Покупают авто</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/o-nas">О нас</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/kontakti">Контакты</a>
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
                                        <li class="nav-item">
                                            <a href="{{ route('logout') }}" class="header__nav-btn-profile nav-link"
                                               onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                    <i class="fa fa-sign-out-alt"></i> {{ __('Выход') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
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

@include('front.form.search')

<section class="body">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mt-3 mt-md-0">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('warning') }}
                    </div>
                @endif
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

<div class="marketcarsModal modal bd-example-modal-lg fade" id="marketcarsModal" tabindex="-1" role="dialog" aria-labelledby="marketcarsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="resultModal">
                    Загрузка...
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/frontend/media/js/mask.js"></script>
<script src="/frontend/media/js/bootstrap.min.js"></script>
<script src="/frontend/media/js/bootstrap.bundle.min.js"></script>
<script src="/frontend/media/js/custom.js"></script>

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
        $("#phone").mask("+7(999)999-99-99");
    });
</script>

<script async="async" src="//bmst.pw/2770804x50.js"></script>

</body>
</html>