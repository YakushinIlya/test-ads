<div class="profile__sidebar">
    <a href="{{route('adsFormAdd')}}" class="btn btn-danger btn-lg btn-block"><i class="fa fa-plus"></i> Подать объявление</a>
    <div class="profile__sidebar-nav">
        <div class="card mt-3 mb-3">
            <div class="card-header">
                {{$user->first_name}} {{$user->last_name}}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <router-link to="/profile/edit"><i class="fa fa-user-edit"></i> Изменить профиль</router-link>
                </li>
                <li class="list-group-item">
                    <router-link to="/profile/myads"><i class="fa fa-file-spreadsheet"></i> Мои объявления</router-link>
                </li>
                <li class="list-group-item">
                    <a href="#">Мои подписки</a>
                </li>
                <li class="list-group-item">
                    <a href="#">Моя статистика</a>
                </li>
            </ul>
        </div>
    </div>
</div>