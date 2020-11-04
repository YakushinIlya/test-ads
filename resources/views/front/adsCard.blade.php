@if(isset($ads) && !empty($ads))
    <div class="card mb-3">
        <img src="/uploads/ads/{{$ads->avatar}}" class="card-img-top" alt="{{$ads->head}}">
        <div class="card-footer">
            <small class="badge badge-success price" data-toggle="tooltip" data-placement="top" title="Цена в рублях">{{$ads->price}} <i class="fa fa-ruble-sign"></i></small>
        </div>
        <div class="card-body">
            <h1 class="card-title h5">{{$ads->head}}</h1>
            <div>
                @if($cat=$ads->category()->first())
                    Категория: <a href="{{route('categoryCard', ['id'=>$cat->id])}}">{{$cat->head}}</a>
                @endif
            </div>
            <div>
                Геолокация:
            @if($country=$ads->country()->first())
                <a href="{{route('country', ['id'=>$country->id])}}">{{$country->country_name_ru}}</a>
            @endif
            @if($region=$ads->region()->first())
                / <a href="{{route('region', ['id'=>$region->id])}}">{{$region->region_name_ru}}</a>
            @endif
            @if($city=$ads->city()->first())
                / <a href="{{route('city', ['id'=>$city->id])}}">{{$city->city_name_ru}}</a>
            @endif
            </div>
            <hr>
            <p class="card-text">{{$ads->body}}</p>
            <div class="row">
                <div class="card-text col-12">
                    <i class="fa fa-eye"></i>
                    <small class="text-muted" data-toggle="tooltip" data-placement="top" title="Количество просмотров объявления">{{$ads->views}}</small>
                </div>
                @if(Auth::user()->isAdmin())
                    <div class="card-text col-12 mt-5">
                        <a href="{{route('adminAdsUpdate', ['id'=>$ads->id])}}" class="text-danger" target="_blank"><i class="fa fa-pencil"></i> Редактировать</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @else
@include('404')
@endif