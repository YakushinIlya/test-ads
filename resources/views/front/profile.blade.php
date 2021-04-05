<h1 class="h5">Здравствуйте, {{$user->first_name}} {{$user->last_name}}!</h1>
<div>
    <p>Вы можете в любой момент подать объявление, редактировать объявление и заказать продвижение объявления в нашем сервисе.</p>
    <p>А также, вы можете редактировать ваш профиль и, сменить фото вашего профиля нажав на аватар справа.</p>
</div>

<table class="table table-striped table-responsive-md">
    <thead>
    <tr>
        <th scope="col">Тип данных</th>
        <th scope="col">Значение</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Всего ваших объявлений</td>
        <th scope="row"><span class="badge badge-pill badge-success">{{$user->ads()->count()}}</span></th>
    </tr>
    <tr>
        <td>Доступно ваших объявлений</td>
        <th scope="row"><span class="badge badge-pill badge-success">{{
    $user->ads()
    ->where('deleted_at', null)
    ->orWhere('deleted_at', '>', now())
    ->count()}}</span></th>
    </tr>
    <tr>
        <td>Всего просмотров ваших объявлений</td>
        <th scope="row"><span class="badge badge-pill badge-success">{{$user->ads()->sum('views')}}</span></th>
    </tr>
    <tr>
        <td>Дата регистрации</td>
        <th scope="row">{{substr($user->created_at, 0, 10)}}</th>
    </tr>
    </tbody>
</table>