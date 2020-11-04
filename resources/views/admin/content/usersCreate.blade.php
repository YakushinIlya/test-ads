<form method="post" action="{{route('adminUsersCreate')}}" accept="application/json">
    @csrf
    <div class="form-group">
        <label for="first_name">Имя</label>
        <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Введите имя пользователя" value="{{old('first_name')}}">
    </div>
    <div class="form-group">
        <label for="last_name">Фамилия</label>
        <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Введите фамилию пользователя" value="{{old('last_name')}}">
    </div>

    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Введите email адрес пользователя">
    </div>
    <div class="form-group">
        <label for="phone">Телефон</label>
        <input type="num" name="phone" class="form-control" id="phone" placeholder="Введите номер телефона пользователя">
    </div>

    <div class="form-group">
        <label for="info">Информация</label>
        <textarea name="info" id="info" rows="5" class="form-control" placeholder="Введите краткую информацию о пользователе"></textarea>
    </div>

    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="text" name="password" class="form-control" id="password" placeholder="Задайте пароль пользователя" value="{{App\User::genPass()}}">
    </div>

    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Сохранить</button>
</form>