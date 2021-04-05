<div class="ads__list">
    @if(isset($ads_list) && !empty($ads_list[0]))
        <div class="row">
            <div class="card-group">

                @foreach($ads_list as $ads)
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
                        </div>
                    </div>
                @endforeach
                    <div class="col-12 mt-5 mb-3">
                        {!! $ads_list->links(); !!}
                    </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning">Данный запрос не принес результата.</div>
    @endif
</div>
