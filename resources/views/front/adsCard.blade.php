@if(isset($ads) && !empty($ads))
    <div class="card ads-card mb-3">
        @if(strpos($ads->avatar, 'http')===false && !empty($ads->avatar))
            @if(!empty($ads->photo))
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="/uploads/ads/{{$ads->avatar}}" alt="{{$ads->head}}">
                        </div>
                        @foreach(json_decode(base64_decode($ads->photo)) as $photo)
                            <div class="carousel-item">
                                <img class="d-block w-100" src="/uploads/ads/{{$photo}}" alt="{{$ads->head}}">
                            </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @else
                <img src="/uploads/ads/{{$ads->avatar??'no_photo.jpg'}}" class="card-img-top" alt="{{$ads->head}}">
            @endif
        @elseif(empty($ads->avatar))
            <img src="/uploads/ads/no_photo.jpg" class="card-img-top" alt="{{$ads->head}}">
        @else
            @if(!empty($ads->photo))
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php($i=0)
                        @foreach(json_decode(base64_decode($ads->photo)) as $photo)
                            @if($i==0)
                                @php($clA=' active')
                            @else
                                @php($clA='')
                            @endif
                            <div class="carousel-item{{$clA}}">
                                <img class="d-block w-100" src="{{$photo}}" alt="{{$ads->head}}">
                            </div>
                            @php($i++)
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @else
                <img src="{{$ads->avatar}}" class="card-img-top" alt="{{$ads->head}}">
            @endif
        @endif
        <div class="card-footer">
            <div class="float-left">
                <small class="badge badge-success price" data-toggle="tooltip" data-placement="top" title="Цена в рублях">{{number_format($ads->price, 2, '.', ' ')}} <i class="fa fa-ruble-sign"></i></small>
            </div>
            <div class="float-right">
                {{$ads->username??''}}
                <div class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="Телефон автора объявления"><i class="fa fa-phone-alt"></i>
                    @if($ads->phone)
                        {!! base64_decode($ads->phone) !!}
                @else
                    {!! $us->phone !!}
                    @endif
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
            <h1 class="card-title h5">{{$ads->head}}</h1>

            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <!-- CarCard -->
            <ins class="adsbygoogle"
                 style="display:block"
                 data-ad-client="ca-pub-6989231873707017"
                 data-ad-slot="7542809873"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>

            <div>
                @if($cat=$ads->category()->first())
                    <a href="{{route('categoryCard', ['id'=>$cat->id])}}">{{$cat->head}}</a>
                @endif
            </div>
            <div>
            @if($country=$ads->country()->first())
                <a href="{{route('country', ['id'=>$country->id])}}">{{$country->country_name_ru}}</a>
            @endif
            @if($region=$ads->region()->first())
                / <a href="{{route('region', ['id'=>$region->id])}}">{{$region->region_name_ru}}</a>
            @endif
            @if($city=$ads->city()->first())
                / <a href="{{route('city', ['id'=>$city->id])}}">{{$city->city_name_ru}}</a>
            @elseif(!empty($ads->city))
                / {{$ads->city}}
            @endif
            </div>

            <ul class="nav nav-tabs mt-md-3" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="desc-tab" data-toggle="tab" href="#desc" role="tab" aria-controls="desc" aria-selected="true">Описание</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="params-tab" data-toggle="tab" href="#params" role="tab" aria-controls="params" aria-selected="false">Параметры</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="desc" role="tabpanel" aria-labelledby="desc-tab">
                    <p class="card-text">{!! base64_decode($ads->body) !!}</p>
                </div>
                <div class="tab-pane fade" id="params" role="tabpanel" aria-labelledby="params-tab">
                    @if(!empty($ads->params) && !is_null($ads->params))
                        <table class="table table-striped table-responsive-sm">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Значение</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(json_decode(base64_decode($ads->params)) as $param)
                                <tr>
                                    <td>{{$param->name}}</td>
                                    <td>{{$param->value}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-warning">Параметры объявления не найдены</div>
                    @endif
                </div>
            </div>

            <noindex>
                <div class="mt-5">
                    <strong>Поделитесь объявлением</strong>
                    <script src="https://yastatic.net/share2/share.js"></script>
                    <div class="ya-share2" data-curtain data-size="l" data-services="vkontakte,facebook,odnoklassniki,messenger,telegram,twitter,viber,whatsapp,skype"></div>
                </div>
            </noindex>

            <div class="mt-md-3">
                <div class="float-left" data-toggle="tooltip" data-placement="top" title="Количество просмотров объявления">
                    <i class="fa fa-eye"></i>
                    <small class="text-muted">{{$ads->views}}</small>
                </div>
                <div class="float-right">
                    @if($us=$ads->user()->first())
                        <a data-toggle="tooltip" data-placement="top" title="Автор объявления" href="{{route('userCard', ['id'=>$us->id])}}">
                            <i class="fa fa-user"></i> {{$us->first_name}} {{$us->last_name}}
                        </a>
                    @endif
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="row">
                @if(Auth()->check() && Auth::user()->isAdmin())
                    <div class="card-text col-12 mt-5">
                        <a href="{{route('adminAdsUpdate', ['id'=>$ads->id])}}" class="text-danger" target="_blank"><i class="fa fa-pencil"></i> Редактировать</a>
                        <br>
                        <a href="{{route('adminAdsDelete', ['id'=>$ads->id])}}" class="text-danger" target="_blank"><i class="fa fa-trash"></i> Удалить</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @else
@include('error.404')
@endif