<a href="{{route('adsCreate')}}" class="btn btn-danger btn-lg btn-block"><i class="fa fa-plus"></i> Подать объявление</a>
<div class="category__add-ads--region mt-3">
        @if($countryList=\App\Model\Country::whereIn('id', \App\Model\Adscountry::country())->get()->toArray())
        <h3 class="h6 mt-3"><i class="fa fa-globe"></i> Страна</h3>
            @foreach($countryList as $country)
                <a href="{{route('country', ['id'=>$country['id']])}}">{{$country['country_name_ru']}}</a>
            @endforeach
        @endif
        @if($regionList=\App\Model\Region::whereIn('id', \App\Model\Adsregion::region())->get()->toArray())
        <h3 class="h6 mt-3"><i class="fad fa-globe"></i> Регион</h3>
        @foreach($regionList as $region)
                <a href="{{route('region', ['id'=>$region['id']])}}">{{$region['region_name_ru']}}</a>
        @endforeach
        @endif
        @if($cityList=\App\Model\City::whereIn('id', \App\Model\Adscity::city())->get()->toArray())
        <h3 class="h6 mt-3"><i class="fal fa-globe"></i> Город</h3>
        @foreach($cityList as $city)
                <a href="{{route('city', ['id'=>$city['id']])}}">{{$city['city_name_ru']}}</a>
        @endforeach
                @endif
</div>