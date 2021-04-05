<div id="userPhoto">
    <img src="/uploads/ads/{{$ads->avatar}}" class="img-fluid" width="250px">
</div>
<div>
    <p>Чем больше пунктов вы заполните - тем больше вероятности что ваше объявление будет найдено по заполненным параметрам.<br>
        Поля отмеченные <strong class="text-danger">*</strong> обязательны к заполнению.</p>
</div>
<form method="post" action="{{route('adsUpdate', ['id'=>$ads->id])}}" enctype="multipart/form-data">
    @csrf
    <div class="btn-group btn-group-toggle mb-3" data-toggle="buttons">
        <label class="btn btn-outline-danger active">
            <input type="radio" name="status" value="sell" id="sell" autocomplete="off" checked> Продать авто
        </label>
        <label class="btn btn-outline-danger">
            <input type="radio" name="status" value="buy" id="buy" autocomplete="off"> Купить авто
        </label>
    </div>
    <div class="form-group">
        <label for="head"><strong class="text-danger">*</strong> Заголовок объявления</label>
        <input type="text" name="head" class="form-control" id="head" value="{{$ads->head}}">
    </div>
    @if(isset($categories[0]))
        <div class="form-group">
            <label for="category"><strong class="text-danger">*</strong> Марка автомобиля</label>
            <select name="category" class="form-control @error('category') is-invalid @enderror" id="category">
                <option value="" selected disabled>-- Выберите марку автомобиля --</option>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}" @if($ads->category()->select('category_id')->first()->category_id==$cat->id)
                        selected @endif>{{$cat->head}}</option>
                @endforeach
            </select>
        </div>
    @endif
    <div class="form-group">
        <label for="year"><strong class="text-danger">*</strong> Год выпуска</label>
        <select name="year" class="form-control @error('year') is-invalid @enderror" id="year">
            <option value="" selected disabled>-- Выберите год выпуска автомобиля --</option>
            @for($i=date('Y'); $i>=1900; $i--)
                <option value="{{$i}}" @if($ads->year==$i)
                    selected @endif>{{$i}}</option>
            @endfor
        </select>
    </div>
    <div class="form-group">
        <label for="motor"><strong class="text-danger">*</strong> Тип двигателя</label>
        <select name="motor" class="form-control @error('motor') is-invalid @enderror" id="motor">
            <option value="" selected disabled>-- Выберите типа двигателя автомобиля --</option>
            @foreach($motor as $m)
                <option value="{{$m}}" @if($ads->motor==$m)
                    selected @endif>{{$m}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="numbervin"><strong class="text-danger">*</strong> VIN или номер кузова</label>
        <input type="text" name="numbervin" class="form-control @error('numbervin') is-invalid @enderror" value="{{$ads->numbervin}}" id="numbervin">
    </div>
    <div class="form-group">
        <label for="condition">Состояние</label>
        <select name="conditioncar" class="form-control @error('condition') is-invalid @enderror" id="condition">
            <option value="" selected disabled>-- Выберите состояние автомобиля --</option>
            @foreach($condition as $c)
                <option value="{{$c}}" @if($ads->conditioncar==$c)
                selected @endif>{{$c}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="bodycar">Тип кузова</label>
        <select name="bodycar" class="form-control @error('bodycar') is-invalid @enderror" id="bodycar">
            <option value="" selected disabled>-- Выберите тип кузова автомобиля --</option>
            @foreach($bodycar as $b)
                <option value="{{$b}}" @if($ads->bodycar==$b)
                selected @endif>{{$b}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="mileage">Пробег КМ</label>
        <input type="number" name="mileage" class="form-control @error('mileage') is-invalid @enderror" id="mileage" value="{{$ads->mileage}}">
    </div>
    <div class="form-group">
        <label for="userpts">Владельцев по ПТС</label>
        <input type="number" name="userpts" class="form-control @error('userpts') is-invalid @enderror" id="userpts" value="{{$ads->userpts}}">
    </div>
    <div class="form-group">
        <label for="door">Количество дверей</label>
        <input type="number" name="door" class="form-control @error('door') is-invalid @enderror" id="door" value="{{$ads->door}}">
    </div>
    <div class="form-group">
        <label for="avatar">Главное фото объявления</label>
        <input type="file" name="avatar" class="form-control-file" ref="file" id="avatar">
    </div>
    <div class="form-group">
        <label for="body"><strong class="text-danger">*</strong> Текст объявления</label>
        <textarea name="body" class="form-control" id="body" rows="5">{{base64_decode($ads->body)}}</textarea>
    </div>
    <div class="form-group">
        <label for="price"><strong class="text-danger">*</strong> Цена</label>
        <input name="price" type="number" class="form-control" id="price" value="{{$ads->price}}">
    </div>
    <button type="submit" class="btn btn-success"><i class="fa fa-file-plus"></i> Опубликовать объявление</button>
</form>