<h1 class="d-none">{{config('ads.h1')}}</h1>
<div class="ads__list">
    <div class="btn btn-outline-dark d-block d-md-none mb-2 marketcarsModalBrand" data-toggle="modal" data-target="#marketcarsModal"><i class="fab fa-autoprefixer"></i> Марки автомобилей</div>
    @if(isset($ads_list) && !empty($ads_list[0]))
        <div class="row">
            <div class="card-group">

                @foreach($ads_list as $ads)
                    <div class="card col-12 col-sm-6 col-md-4 col-lg-3">
                        <a href="{{route('adsCard', ['id'=>$ads->id.'_'.$ads->url])}}">
                            @if(strpos($ads->avatar, 'http')===false && !empty($ads->avatar))
                                <img src="/uploads/ads/{{$ads->avatar??'no_photo.jpg'}}" class="card-img-top" alt="{{$ads->head}}">
                            @elseif(empty($ads->avatar))
                                <img src="/uploads/ads/no_photo.jpg" class="card-img-top" alt="{{$ads->head}}">
                            @else
                                <img src="{{$ads->avatar}}" class="card-img-top" alt="{{$ads->head}}">
                            @endif
                        </a>
                        <div class="card-body card-body-list">
                            <p class="card-city">{{$ads->city}}</p>
                            <a href="{{route('adsCard', ['id'=>$ads->id.'_'.$ads->url])}}">
                                <h2 class="card-title h6">{{$ads->head}}</h2>
                            </a>
                            <p class="card-text">{!! $str->limit(base64_decode($ads->body), 50) !!}</p>
                        </div>
                        <div class="card-footer card-footer-list">
                            <small class="badge badge-success">{{number_format($ads->price, 2, '.', ' ')}} <i class="fa fa-ruble-sign"></i></small>
                        </div>
                    </div>
                @endforeach
                <div class="col-12 mt-5 mb-3 table-responsive">
                    {!! $ads_list->links(); !!}
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning">{{__('Объявлений не найдено')}}</div>
    @endif
</div>






