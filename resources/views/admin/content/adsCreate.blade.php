<form method="post" action="{{route('adminAdsCreate')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="head">Заголовок объявления</label>
        <input type="text" name="head" class="form-control @error('head') is-invalid @enderror" id="head">
    </div>
    <div class="form-group">
        <label for="country">Страна проживания</label>
        <select name="country" class="form-control @error('country') is-invalid @enderror" id="country">
            <option selected disabled>-- Выберите страну --</option>
            @foreach($countryList as $country)
                <option value="{{$country->id}}">{{$country->country_name_ru}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="region">Регион проживания</label>
        <select name="region" class="form-control @error('region') is-invalid @enderror" id="region">
            <option selected disabled>-- Выберите регион --</option>
        </select>
    </div>
    <div class="form-group">
        <label for="city">Город проживания</label>
        <select name="city" class="form-control @error('city') is-invalid @enderror" id="city">
            <option selected disabled>-- Выберите город --</option>
        </select>
    </div>
    @if(isset($categories[0]))
    <div class="form-group">
        <label for="category">Категория объявления</label>
        <select name="category" class="form-control @error('category') is-invalid @enderror" id="category">
            @foreach($categories as $cat)
                <option value="{{$cat->id}}">{{$cat->head}}</option>
            @endforeach
        </select>
    </div>
    @endif
    <div class="form-group">
        <label for="avatar">Главное фото объявления</label>
        <input type="file" name="avatar" class="form-control-file @error('avatar') is-invalid @enderror" ref="file" id="avatar">
    </div>
    <div class="form-group">
        <label for="body">Текст объявления</label>
        <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" rows="5"></textarea>
    </div>
    <div class="form-group">
        <label for="price">Цена</label>
        <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" id="price">
    </div>
    <button type="submit" class="btn btn-success"><i class="fa fa-file-plus"></i> Опубликовать объявление</button>
</form>