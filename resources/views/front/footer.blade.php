<section class="footer mt-auto py-3">
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer__logo">
                    <img src="/frontend/media/img/logo.png" alt="{{config('ads.title')}}" class="img-fluid">
                </div>
                <div class="col-md-6 footer__nav">
                    <nav class="navbar navbar-expand-lg navbar-light">
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
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </footer>
</section>