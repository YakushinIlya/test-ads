<a href="{{route('adminUsersCreate')}}" class="btn btn-success"><i class="fa fa-user-plus"></i> Создать пользователя</a>
<div class="row mt-5">
    @php($bgCard='bg-secondary')
    @foreach($users as $user)
        <div class="col-md-3 mb-3">
            <div class="card text-white {{$bgCard}}">
                <div class="card-header">{{$user->first_name}} {{$user->last_name}}</div>
                <div class="card-body">
                    <p class="card-text">
                        Статус: @if(empty($user->deleted_at))
                            <span class="badge badge-success">Активный</span>
                                @elseif($user->status==0 && !empty($user->status_time_end))
                            <span class="badge badge-warning">Заблокирован до: {{$user->status_time_end}}</span>
                                @else
                            <a href="{{route('adminUsersDeleteNew', ['id'=>$user->id])}}" data-toggle="tooltip" data-placement="top" title="Удалить навсегда">
                                <span class="badge badge-danger">Удален</span>
                            </a>
                                @endif
                        <br>
                        @if(!is_null($user->email_verified_at))
                            <span class="badge badge-success">Подтвержден</span>
                        @else
                            <span class="badge badge-dark">Не подтвержден</span>
                        @endif
                        <br>
                        e-mail: {{$user->email}}<br>
                        phone: {{$user->phone}}<br>
                    </p>
                    <a href="{{route('adminUsersUpdate', ['id'=>$user->id])}}" class="btn btn-primary btn-sm mb-1"><i class="fa fa-user-edit"></i> Редактировать</a><br>
                    {{--<a href="#" class="btn btn-warning btn-sm mb-1"><i class="fa fa-user-slash"></i> Заблокировать</a><br>--}}
                    <a href="{{route('adminUsersDelete', ['id'=>$user->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-user-minus"></i> Удалить</a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="col-md-12 mt-5">
        {!! $users->links() !!}
    </div>
</div>