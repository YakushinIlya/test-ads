<div class="category__list">
    @if(isset($category_list) && !empty($category_list))
        <div class="row">
            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-home"></span>
                    <br>
                    <span>Недвижимость</span>
                </a>
            </div>
            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-car-side"></span>
                    <br>
                    <span>Автомобили</span>
                </a>
            </div>
            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-user-tie"></span>
                    <br>
                    <span>Услуги</span>
                </a>
            </div>
            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-laptop-house"></span>
                    <br>
                    <span>Работа</span>
                </a>
            </div>

            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-user-hard-hat"></span>
                    <br>
                    <span>Строительство</span>
                </a>
            </div>
            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-biking-mountain"></span>
                    <br>
                    <span>Мототехника</span>
                </a>
            </div>
            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-island-tropical"></span>
                    <br>
                    <span>Туризм</span>
                </a>
            </div>
            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-burger-soda"></span>
                    <br>
                    <span>Продукты питания</span>
                </a>
            </div>

            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-paw-claws"></span>
                    <br>
                    <span>Животные</span>
                </a>
            </div>
            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-books"></span>
                    <br>
                    <span>Книги</span>
                </a>
            </div>
            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-tennis-ball"></span>
                    <br>
                    <span>Спорт</span>
                </a>
            </div>
            <div class="col-md-3 col-6 category__list-icon">
                <a href="#">
                    <span class="fa fa-ski-jump"></span>
                    <br>
                    <span>Хобби</span>
                </a>
            </div>
        </div>
    @endif
    @if(isset($ads_list) && !empty($ads_list))
        <div class="row">
            <div class="card-group">

                @foreach($ads_list as $ads)
                    <div class="card col-md-4">
                        <a href="{{route('adsCard', ['id'=>$ads->id])}}">
                            <img src="/uploads/ads/{{$ads->avatar}}" class="card-img-top" alt="{{$ads->head}}">
                        </a>
                        <div class="card-body">
                            <a href="{{route('adsCard', ['id'=>$ads->id])}}">
                                <h5 class="card-title">{{$ads->head}}</h5>
                            </a>
                            <p class="card-text">{{$ads->body}}</p>
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






