<!doctype html>
<html lang="ru" class="h-100">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/frontend/media/css/bootstrap.min.css">
    <link rel="stylesheet" href="/frontend/media/css/all.min.css">
    <link rel="stylesheet" href="/backend/media/css/dashboard.css">
    <link rel="stylesheet" href="/backend/media/css/style.css">
</head>
<body class="d-flex flex-column h-100">

<div class="d-flex flex-column h-100" id="app">

    <nav class="navbar navbar-dark sticky-top bg-dark p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">{{config('ads.title')}}</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt"></i> {{__('Выход')}}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            @yield('sidebar')
            @yield('content')
        </div>
    </div>

@yield('footer')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/frontend/media/js/bootstrap.min.js"></script>
<script src="/frontend/media/js/bootstrap.bundle.min.js"></script>
<script src="/frontend/media/js/all.min.js"></script>
<script src="/frontend/media/js/custom.js"></script>

<script type="text/javascript">
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

</body>
</html>