<div class="row">
    <div class="col-md-6">
        <table class="table table-striped table-responsive-md">
            <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="2" class="text-center">Объявления</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Всего объявлений</td>
                <td>{{$ads->count()}}</td>
            </tr>
            <tr>
                <td>Всего опубликованных объявлений</td>
                <td>{{$ads->whereNull('deleted_at')->count()}}</td>
            </tr>
            <tr>
                <td>Всего просмотров объявлений</td>
                <td>{{$ads->sum('views')}}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-striped table-responsive-md">
            <thead class="thead-dark">
            <tr>
                <th scope="col" colspan="2" class="text-center">Пользователи</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Всего пользователей</td>
                <td>{{$user->count()}}</td>
            </tr>
            <tr>
                <td>Всего подтвержденных пользователей</td>
                <td>{{$user->whereNotNull('email_verified_at')->count()}}</td>
            </tr>
            <tr>
                <td>Всего VIP пользователей</td>
                <td>{{$user->where('status_time_end', '<', now())->whereNotNull('status_time_end')->count()}}</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
