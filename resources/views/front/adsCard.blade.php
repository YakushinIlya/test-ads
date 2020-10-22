@if(isset($ads) && !empty($ads))
    <div class="card mb-3">
        <img src="/uploads/ads/{{$ads['avatar']}}" class="card-img-top" alt="{{$ads['head']}}">
        <div class="card-footer">
            <small class="badge badge-success">{{$ads->price}} <i class="fa fa-ruble-sign"></i></small>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$ads['head']}}</h5>
            <p class="card-text">{{$ads['body']}}</p>
            <p class="card-text"><i class="fa fa-eye"></i> <small class="text-muted">{{$ads->views}}</small></p>
        </div>
    </div>
    @else
@include('404')
@endif