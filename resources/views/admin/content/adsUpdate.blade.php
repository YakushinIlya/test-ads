<div id="userPhoto">
    <img src="/uploads/ads/{{$ads->avatar}}" class="img-fluid" width="250px">
</div>
<form method="post" action="{{route('adminAdsUpdate', ['id'=>$ads->id])}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="head">Заголовок объявления</label>
        <input type="text" name="head" class="form-control" id="head" value="{{$ads->head}}">
    </div>
    <div class="form-group">
        <label for="avatar">Главное фото объявления</label>
        <input type="file" name="avatar" class="form-control-file" ref="file" id="avatar">
    </div>
    <div class="form-group">
        <label for="body">Текст объявления</label>
        <textarea name="body" class="form-control" id="body" rows="5">{{$ads->body}}</textarea>
    </div>
    <div class="form-group">
        <label for="price">Цена</label>
        <input name="price" type="number" class="form-control" id="price" value="{{$ads->price}}">
    </div>
    <button type="submit" class="btn btn-success"><i class="fa fa-file-plus"></i> Опубликовать объявление</button>
</form>