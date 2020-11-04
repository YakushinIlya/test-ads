<div class="profile__sidebar">
    <a href="{{route('adsCreate')}}" class="btn btn-danger btn-lg btn-block"><i class="fa fa-plus"></i> Подать объявление</a>
    <div class="profile__sidebar-nav">
        <div class="card mt-3 mb-3">
            <div class="card-header">
                {{$user->first_name}} {{$user->last_name}}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="/profile/edit"><i class="fa fa-user-edit"></i> Изменить профиль</a>
                </li>
                <li class="list-group-item">
                    <a href="/profile/myads"><i class="fa fa-file-spreadsheet"></i> Мои объявления</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Мои подписки</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Моя статистика</a>
                </li>
                @if(Auth::user()->isAdmin())
                    <li class="list-group-item">
                        <a href="{{route('adminPanel')}}" class="text-danger" target="_blank"><i class="fa fa-user-crown"></i> Панель администратора</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>