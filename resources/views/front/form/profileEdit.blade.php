<form method="post" action="{{route('profileEdit')}}">
    @csrf
    <div class="form-group">
        <label for="first_name">Ваше имя</label>
        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{$user->first_name}}">
    </div>
    <div class="form-group">
        <label for="last_name">Ваша фамилия</label>
        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{$user->last_name}}">
    </div>
    <div class="form-group">
        <label for="country">Страна проживания</label>
        <select name="country" class="form-control @error('country') is-invalid @enderror" id="country">
            @if(!empty($userCountry) && isset($userCountry[0]))
                <option value="{{$userCountry[0]->id}}" selected>{{$userCountry[0]->country_name_ru}}</option>
            @else
                <option selected disabled>-- Выберите страну --</option>
                @foreach($countryList as $country)
                    <option value="{{$country->id}}">{{$country->country_name_ru}}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="region">Регион проживания</label>
        <select name="region" class="form-control @error('region') is-invalid @enderror" id="region">
            @if(!empty($userRegion) && isset($userRegion[0]))
                <option value="{{$userRegion[0]->id}}" selected>{{$userRegion[0]->region_name_ru}}</option>
            @else
                <option selected disabled>-- Выберите регион --</option>
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="city">Город проживания</label>
        <select name="city" class="form-control @error('city') is-invalid @enderror" id="city">
            @if(!empty($userCity) && isset($userCity[0]))
                <option value="{{$userCity[0]->id}}" selected>{{$userCity[0]->city_name_ru}}</option>
            @else
                <option selected disabled>-- Выберите город --</option>
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="email">Ваш E-mail</label>
        @if($user->email)
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" disabled>
        @endif
    </div>
    <div class="form-group">
        <label for="phone">Ваш телефон</label>
        <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{$user->phone}}">
    </div>
    <div class="form-group">
        <label for="info">Краткая информация о себе</label>
        <textarea name="info" class="form-control @error('info') is-invalid @enderror" id="info" rows="5">{{$user->info}}</textarea>
    </div>
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Сохранить данные</button>
</form>
