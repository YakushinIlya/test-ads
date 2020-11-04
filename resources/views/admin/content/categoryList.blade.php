<a href="{{route('adminCategoryCreate')}}" class="btn btn-success"><i class="fa fa-user-plus"></i> Создать категорию</a>
<div class="row mt-5">
    @php($bgCard='bg-secondary')
    @foreach($categories as $category)
        <div class="col-md-3 mb-3">
            <div class="card text-white {{$bgCard}}">
                <div class="card-header"><i class="{{$category->icon}}"></i> {{$category->head}}</div>
                <div class="card-body">
                    <p class="card-text">
                        Статус: @if(empty($category->deleted_at))
                            <span class="badge badge-success">Активный</span>
                        @else
                            <span class="badge badge-danger">Удален</span>
                        @endif
                    </p>
                    <a href="{{route('adminCategoryUpdate', ['id'=>$category->id])}}" class="btn btn-primary btn-sm mb-1"><i class="fa fa-user-edit"></i> Редактировать</a>
                    <br>
                    <a href="{{route('adminCategoryDelete', ['id'=>$category->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-user-minus"></i> Удалить</a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="col-md-12 mt-5">
        {!! $categories->links() !!}
    </div>
</div>