<a href="{{route('adminPageCreate')}}" class="btn btn-success"><i class="fa fa-user-plus"></i> Создать страницу</a>
<div class="row mt-5">
    @php($bgCard='bg-secondary')
    @foreach($pages as $page)
        <div class="col-md-3 mb-3">
            <div class="card text-white {{$bgCard}}">
                <div class="card-header"><i class="{{$page->icon}}"></i> {{$page->head}}</div>
                <div class="card-body">
                    <p class="card-text">
                        Статус: @if(empty($page->deleted_at))
                            <span class="badge badge-success">Активный</span>
                        @else
                            <a href="{{route('adminPageDeleteNew', ['id'=>$page->id])}}" data-toggle="tooltip" data-placement="top" title="Удалить навсегда">
                                <span class="badge badge-danger">Удален</span>
                            </a>
                        @endif
                    </p>
                    <a href="{{route('adminPageUpdate', ['id'=>$page->id])}}" class="btn btn-primary btn-sm mb-1"><i class="fa fa-user-edit"></i> Редактировать</a>
                    <br>
                    <a href="{{route('adminPageDelete', ['id'=>$page->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-user-minus"></i> Удалить</a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="col-md-12 mt-5">
        {!! $pages->links() !!}
    </div>
</div>