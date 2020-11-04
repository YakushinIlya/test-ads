<div class="category__list">
    <h1><i class="fa fa-map-marked-alt"></i> {{$title}}</h1>
    @if(isset($ads_list) && !empty($ads_list))
        <div class="row">
            <div class="card-group mt-5">

                @foreach($ads_list as $ads)
                    <div class="card col-md-4">
                        <a href="{{route('adsCard', ['id'=>$ads->id])}}">
                            <img src="/uploads/ads/{{$ads->avatar}}" class="card-img-top" alt="{{$ads->head}}">
                        </a>
                        <div class="card-body">
                            <a href="{{route('adsCard', ['id'=>$ads->id])}}">
                                <h2 class="card-title h6">{{$ads->head}}</h2>
                            </a>
                            <p class="card-text">{{$str->limit($ads->body, 50)}}</p>
                        </div>
                        <div class="card-footer">
                            <small class="badge badge-success">{{$ads->price}} <i class="fa fa-ruble-sign"></i></small>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    @else
        <div class="alert alert-warning">{{__('Объявлений не найдено')}}</div>
    @endif
</div>






