@if(isset($adsList[0]) && !empty($adsList))
    <div class="row">
        <div class="card-group">

            @foreach($adsList as $ads)
                <div class="card col-md-4">
                    <a href="{{route('adsCard', ['id'=>$ads->id.'_'.$ads->url])}}">
                        @if(strpos($ads->avatar, 'http')===false && !empty($ads->avatar))
                            <img src="/uploads/ads/{{$ads->avatar??'no_photo.jpg'}}" class="card-img-top" alt="{{$ads->head}}">
                        @elseif(empty($ads->avatar))
                            <img src="/uploads/ads/no_photo.jpg" class="card-img-top" alt="{{$ads->head}}">
                        @else
                            <img src="{{$ads->avatar}}" class="card-img-top" alt="{{$ads->head}}">
                        @endif
                    </a>
                    <div class="card-body">
                        <p class="card-city">{{$ads->city}}</p>
                        <a href="{{route('adsCard', ['id'=>$ads->id.'_'.$ads->url])}}">
                            <h2 class="card-title h6">{{$ads->head}}</h2>
                        </a>
                        <p class="card-text">{!! $str->limit(base64_decode($ads->body), 50) !!}</p>
                    </div>
                    <div class="card-footer">
                        <small class="badge badge-success">{{number_format($ads->price, 2, '.', ' ')}} <i class="fa fa-ruble-sign"></i></small>
                        <a href="{{route('adsUpdate', ['id'=>$ads->id])}}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Редактировать объявление">
                            <i class="fa fa-pen-alt"></i>
                        </a>
                        <a href="{{route('adsDelete', ['id'=>$ads->id])}}" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Удалить объявление">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="col-12 mt-5">
            {!! $adsList->links() !!}
        </div>
    </div>
@else
    <div class="alert alert-warning">{{__('Объявлений не найдено')}}</div>
@endif

