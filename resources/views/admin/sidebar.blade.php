<nav class="col-md-2 d-none d-md-block bg-dark sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fa fa-home fa-lg"></i>
                    На главную
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('adminPanel')}}">
                    <i class="fa fa-presentation fa-lg"></i>
                    Приборная панель
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('adminUsersAll')}}">
                    <i class="fa fa-users fa-lg"></i>
                    Пользователи
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('adminCategoriesAll')}}">
                    <i class="fa fa-folders fa-lg"></i>
                    Категории
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('adminAdsAll')}}">
                    <i class="fa fa-file-spreadsheet fa-lg"></i>
                    Объявления
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span class="badge badge-light">Раздел парсинга</span>
            <a class="d-flex align-items-center text-muted" href="#">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span data-feather="file-text"></span>
                    Year-end sale
                </a>
            </li>
        </ul>
    </div>
</nav>