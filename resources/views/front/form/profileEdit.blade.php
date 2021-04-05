<div>
    <p>Поля отмеченные <strong class="text-danger">*</strong> обязательны к заполнению.</p>
</div>
<form method="post" action="{{route('profileEdit')}}">
    @csrf
    <div class="form-group">
        <label for="first_name"><strong class="text-danger">*</strong> Ваше имя</label>
        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{$user->first_name}}">
    </div>
    <div class="form-group">
        <label for="last_name"><strong class="text-danger">*</strong> Ваша фамилия</label>
        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{$user->last_name}}">
    </div>
    <div class="form-group">
        <label for="region"><strong class="text-danger">*</strong> Регион проживания</label>
            @if(!empty($userRegion) && isset($userRegion[0]))
            <select class="form-control @error('region') is-invalid @enderror" id="region" disabled>
                <option value="{{$userRegion[0]->old}}" selected>{{$userRegion[0]->region_name_ru}}</option>
            @else
                <select name="region" class="form-control @error('region') is-invalid @enderror" id="region">
                <option selected disabled>-- Выберите регион --</option>
                    @if(!empty($regionList[0]))
                        @foreach($regionList as $region)
                            <option value="{{$region->id}}">{{$region->region_name_ru}}</option>
                        @endforeach
                    @endif
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="city"><strong class="text-danger">*</strong> Город проживания</label>
            @if(!empty($userCity) && isset($userCity[0]))
                <select class="form-control @error('city') is-invalid @enderror" id="city" disabled>
                <option value="{{$userCity[0]->id}}" selected>{{$userCity[0]->city_name_ru}}</option>
            @else
                <select name="city" class="form-control @error('city') is-invalid @enderror" id="city" disabled>
                <option selected disabled>-- Выберите город --</option>
            @endif
        </select>
    </div>
    <div class="form-group">
        <label for="email"><strong class="text-danger">*</strong> Ваш E-mail</label>
        @if($user->email)
            <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}" disabled>
        @endif
    </div>
    <div class="form-group">
        <label for="phone"><strong class="text-danger">*</strong> Ваш телефон</label>
        <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{$user->phone}}">
    </div>
    <div class="form-group">
        <label for="info"><strong class="text-danger">*</strong> Краткая информация о себе</label>
        <textarea name="info" class="form-control @error('info') is-invalid @enderror" id="info" rows="5">{!! base64_decode($user->info) !!}</textarea>
    </div>
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Сохранить данные</button>
</form>
