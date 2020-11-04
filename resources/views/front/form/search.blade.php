<section class="search">
    <div class="container">
        <form action="{{route('search')}}" method="post">
            @csrf
            <div class="row search__form">
                <div class="col-md-5">
                    <input name="query" class="form-control form-control-lg" type="text" placeholder="Что вы ищите?" data-toggle="tooltip" data-placement="top" title="Введите товар или услугу которую хотите найти">
                </div>
                <div class="col-md-4">
                    <select name="category" class="form-control form-control-lg" data-toggle="tooltip" data-placement="top" title="Выберите категорию в которой хотите найти">
                        <option value="all">Везде</option>
                        @if(isset($category[0]))
                            @foreach($category as $cat)
                                <option value="{{$cat['id']}}">{{$cat['head']}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class="col-md-3">
                    <button href="#" class="btn btn-success btn-lg btn-block"><i class="fa fa-search"></i> Найти объявление</button>
                </div>
            </div>
        </form>
    </div>
</section>