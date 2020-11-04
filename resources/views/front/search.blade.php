<div class="category__list">
    @if(!is_string($result) && !empty($result[0]))
        <div class="row">
            <div class="card-group">
                @foreach($result as $ads)
                    <div class="card col-md-4">
                        <a href="{{route('adsCard', ['id'=>$ads->id])}}">
                            <img src="/uploads/ads/{{$ads->avatar??'no_photo.jpg'}}" class="card-img-top" alt="{{$ads->head}}">
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
                <div class="col-12 mt-5 mb-3">

                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning">Данный запрос не принес результата.</div>
    @endif
</div>
