<a href="{{route('adminAdsCreate')}}" class="btn btn-success"><i class="fa fa-user-plus"></i> Создать объявление</a>
<div class="row mt-5">
    @php($bgCard='bg-secondary')
    @foreach($adsList as $ads)
        <div class="col-md-3 mb-3">
            <div class="card text-white {{$bgCard}}">
                <div class="card-header">
                    <a href="{{route('adsCard', ['id'=>$ads->id])}}" target="_blank" style="color: #FFF;">{{$ads->head}}</a> -
                    {{$ads->price}} <i class="fa fa-ruble-sign"></i>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <img src="/uploads/ads/{{$ads->avatar??'no_photo.jpg'}}" class="img-thumbnail" height="150px">
                    </p>
                    <p class="card-text">
                        @if($country=$ads->country()->first())
                            <a href="{{route('country', ['id'=>$country->id])}}" target="_blank" style="color: #FFF;">{{$country->country_name_ru}}</a>
                        @endif
                        @if($region=$ads->region()->first())
                            / <a href="{{route('region', ['id'=>$region->id])}}" target="_blank" style="color: #FFF;">{{$region->region_name_ru}}</a>
                        @endif
                        @if($city=$ads->city()->first())
                            / <a href="{{route('city', ['id'=>$city->id])}}" target="_blank" style="color: #FFF;">{{$city->city_name_ru}}</a>
                        @endif
                    </p>
                    <p class="card-text">
                        Статус: @if(empty($ads->deleted_at))
                            <span class="badge badge-success">Активный</span>
                        @else
                            <span class="badge badge-danger">Удален</span>
                        @endif
                    </p>
                    <a href="{{route('adminAdsUpdate', ['id'=>$ads->id])}}" class="btn btn-primary btn-sm mb-1"><i class="fa fa-user-edit"></i> Редактировать</a>
                    <br>
                    <a href="{{route('adminAdsDelete', ['id'=>$ads->id])}}" class="btn btn-danger btn-sm"><i class="fa fa-user-minus"></i> Удалить</a>
                </div>
            </div>
        </div>
    @endforeach

    <div class="col-md-12 mt-5">
        {!! $adsList->links() !!}
    </div>
</div>