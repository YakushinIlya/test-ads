@if(!empty($user->country()->first()))
    <form method="post" action="{{route('adsCreate')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="head">Заголовок объявления</label>
            <input type="text" name="head" class="form-control" id="head">
        </div>
        @if(isset($categories[0]))
        <div class="form-group">
            <label for="category">Категория объявления</label>
            <select name="category" class="form-control" id="category">
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->head}}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class="form-group">
            <label for="avatar">Главное фото объявления</label>
            <input type="file" name="avatar" class="form-control-file" ref="file" id="avatar">
        </div>
        <div class="form-group">
            <label for="body">Текст объявления</label>
            <textarea name="body" class="form-control" id="body" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input name="price" type="number" class="form-control" id="price">
        </div>
        <button type="submit" class="btn btn-success"><i class="fa fa-file-plus"></i> Опубликовать объявление</button>
    </form>
@else
    <div class="alert alert-warning">
        Пожалуйста, заполните ваш профиль прежде чем подавать объявление.
    </div>
@endif