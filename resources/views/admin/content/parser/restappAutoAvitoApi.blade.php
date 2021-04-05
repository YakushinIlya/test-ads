<form method="post" action="{{route('adminParsRestAppAutoAvitoApi')}}" class="row">
    @csrf
    <input type="hidden" name="category_id" value="9">
    <div class="form-group col-md-4">
        <label for="url">URL запроса</label>
        <input type="text" class="form-control" id="url" name="url" value="https://rest-app.net/api/ads">
    </div>
    <div class="form-group col-md-4">
        <label for="login">Логин</label>
        <input type="text" class="form-control" id="login" name="login" value="betmenik@mail.ru">
    </div>
    <div class="form-group col-md-4">
        <label for="token">Token</label>
        <input type="text" class="form-control" id="token" name="token" value="cd228ab37d9564da38edf2166a7ddad9">
    </div>
    <div class="form-group col-md-4">
        <label for="regionAdmin">Регион</label>
        <select class="form-control" id="regionAdmin" name="region_id">
            <option value="0" selected disabled>-- Выберите регион --</option>
            @foreach($regionList as $region)
                <option value="{{$region->old}}">{{$region->region_name_ru}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="cityAdmin">Город</label>
        <select class="form-control" id="cityAdmin" name="city_id" disabled>
            <option value="0">-- Выберите город --</option>
        </select>
    </div>
    <div class="form-group col-md-4">
        <label for="limit">Количество</label>
        <input type="text" class="form-control" id="limit" name="limit" value="1">
    </div>
    <div class="form-group col-md-6">
        <label for="date1">Дата ОТ</label>
        <input type="datetime-local" class="form-control" id="date1" name="date1">
    </div>
    <div class="form-group col-md-6">
        <label for="date2">Дата ДО</label>
        <input type="datetime-local" class="form-control" id="date2" name="date2">
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Начать парсинг</button>
    </div>
</form>
