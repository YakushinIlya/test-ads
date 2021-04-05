@if(!empty($user->country()->first()))
    <div>
        <p>Чем больше пунктов вы заполните - тем больше вероятности что ваше объявление будет найдено по заполненным параметрам.<br>
        Поля отмеченные <strong class="text-danger">*</strong> обязательны к заполнению.</p>
    </div>
    <form method="post" class="adsAddUser" action="{{route('adsCreate')}}" enctype="multipart/form-data">
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
            <input type="text" name="head" class="form-control @error('head') is-invalid @enderror" id="head" placeholder="Продам LADA Vesta">
        </div>
        @if(isset($categories[0]))
        <div class="form-group">
            <label for="category"><strong class="text-danger">*</strong> Марка автомобиля</label>
            <select name="category" class="form-control @error('category') is-invalid @enderror" id="category">
                <option value="" selected disabled>-- Выберите марку автомобиля --</option>
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->head}}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class="form-group">
            <label for="year"><strong class="text-danger">*</strong> Год выпуска</label>
            <select name="year" class="form-control @error('year') is-invalid @enderror" id="year">
                <option value="" selected disabled>-- Выберите год выпуска автомобиля --</option>
                @for($i=date('Y'); $i>=1900; $i--)
                    <option value="{{$i}}">{{$i}}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label for="motor"><strong class="text-danger">*</strong> Тип двигателя</label>
            <select name="motor" class="form-control @error('motor') is-invalid @enderror" id="motor">
                <option value="" selected disabled>-- Выберите типа двигателя автомобиля --</option>
                    <option value="Бензин">Бензин</option>
                    <option value="Газ">Газ</option>
                    <option value="Дизель">Дизель</option>
                    <option value="Электрический">Электрический</option>
                    <option value="Другое">Другое</option>
            </select>
        </div>
        <div class="form-group">
            <label for="numbervin"><strong class="text-danger">*</strong> VIN или номер кузова</label>
            <input type="text" name="numbervin" class="form-control @error('numbervin') is-invalid @enderror" id="numbervin" placeholder="*****************">
        </div>
        <div class="form-group">
            <label for="condition">Состояние</label>
            <select name="conditioncar" class="form-control @error('condition') is-invalid @enderror" id="condition">
                <option value="" selected disabled>-- Выберите состояние автомобиля --</option>
                <option value="Не битый">Не битый</option>
                <option value="Газ">Битый</option>
            </select>
        </div>
        <div class="form-group">
            <label for="bodycar">Тип кузова</label>
            <select name="bodycar" class="form-control @error('bodycar') is-invalid @enderror" id="bodycar">
                <option value="" selected disabled>-- Выберите тип кузова автомобиля --</option>
                <option value="Кроссовер">Кроссовер</option>
                <option value="Внедорожник">Внедорожник</option>
                <option value="Пикап">Пикап</option>
                <option value="Хетчбэк">Хетчбэк</option>
                <option value="Седан">Седан</option>
                <option value="Минивен">Минивен</option>
                <option value="Родстер">Родстер</option>
                <option value="Кабриолет">Кабриолет</option>
                <option value="Купе">Купе</option>
                <option value="Лимузин">Лимузин</option>
            </select>
        </div>
        <div class="form-group">
            <label for="mileage">Пробег КМ</label>
            <input type="number" name="mileage" class="form-control @error('mileage') is-invalid @enderror" id="mileage" placeholder="10000">
        </div>
        <div class="form-group">
            <label for="userpts">Владельцев по ПТС</label>
            <input type="number" name="userpts" class="form-control @error('userpts') is-invalid @enderror" id="userpts" placeholder="5">
        </div>
        <div class="form-group">
            <label for="door">Количество дверей</label>
            <input type="number" name="door" class="form-control @error('door') is-invalid @enderror" id="door" placeholder="5">
        </div>
        <div class="form-group">
            <label for="avatar">Главное фото автомобиля</label>
            <input type="file" name="avatar" class="form-control-file" ref="file" id="avatar" accept="image/*,image/jpeg">
        </div>
        <div class="form-group">
            <label for="photo">Дополнительные фото автомобиля</label>
            <input type="file" name="photo[]" class="form-control-file" ref="file" id="photo" accept="image/*,image/jpeg">
            <input type="file" name="photo[]" class="form-control-file" ref="file" id="photo" accept="image/*,image/jpeg">
            <input type="file" name="photo[]" class="form-control-file" ref="file" id="photo" accept="image/*,image/jpeg">
            <input type="file" name="photo[]" class="form-control-file" ref="file" id="photo" accept="image/*,image/jpeg">
            <input type="file" name="photo[]" class="form-control-file" ref="file" id="photo" accept="image/*,image/jpeg">
        </div>
        <div class="form-group">
            <label for="body"><strong class="text-danger">*</strong> Текст объявления</label>
            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" rows="5" placeholder="Опишите подробнее свой автомобиль"></textarea>
        </div>
        <div class="form-group">
            <label for="price"><strong class="text-danger">*</strong> Цена</label>
            <input name="price" type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="0">
        </div>
        <button type="submit" class="btn btn-success"><i class="fa fa-file-plus"></i> Опубликовать объявление</button>
    </form>
@else
    <div class="alert alert-warning">
        Пожалуйста, заполните ваш профиль прежде чем подавать объявление.
    </div>
@endif