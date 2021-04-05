<form method="post" action="{{route('adminPageUpdate', ['id'=>$page->id])}}" accept="application/json">
    @csrf
    <input type="hidden" name="level" value="1">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="{{$page->title}}">
    </div>
    <div class="form-group">
        <label for="description">Descriptionк</label>
        <input type="text" name="description" class="form-control" id="description" placeholder="Description" value="{{$page->description}}">
    </div>
    <div class="form-group">
        <label for="keywords">Keywords</label>
        <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Keywords" value="{{$page->keywords}}">
    </div>

    <hr>

    <div class="form-group">
        <label for="head">Заголовок</label>
        <input type="text" name="head" class="form-control" id="head" placeholder="Введите заголовок страницы" value="{{$page->head}}">
    </div>
    <div class="form-group">
        <label for="icon">Class fontawesome</label>
        <input type="text" name="icon" class="form-control" id="icon" placeholder="Введите class иконки fontawesome" value="{{$page->icon}}">
    </div>
    <div class="form-group">
        <label for="body">Описание</label>
        <textarea name="body" id="body" rows="5" class="form-control" placeholder="Введите краткую информацию страницы">{{base64_decode($page->body)}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Сохранить</button>
</form>