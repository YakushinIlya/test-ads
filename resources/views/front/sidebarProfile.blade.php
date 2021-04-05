<div class="profile__sidebar">
    <a href="{{route('adsCreate')}}" class="btn btn-danger btn-lg btn-block d-none d-md-block"><i class="fa fa-plus"></i> Подать объявление</a>
    <div class="profile__sidebar-nav">
        <div class="card mt-3 mb-3">
            <div class="card-header">
                <div class="user-avatar-right">
                    <div class="img-avatar">
                        <img src="/uploads/user/avatars/{{$user->avatar}}" class="img-fluid img-thumbnail">
                    </div>
                    <div class="example-2">
                        <div class="form-group">
                            <form method="post" enctype="multipart/form-data">
                                <input type="file" name="avatarUser" accept="image/*" id="avatarUser" class="input-file" onchange="avatarDown()">
                                <label for="avatarUser" class="btn-tertiary js-labelFile">
                                    <i class="icon fa fa-check"></i>
                                    <span class="js-fileName">Загрузить файл</span>
                                </label>
                            </form>
                        </div>
                    </div>
                </div>
                <strong>{{$user->first_name}} {{$user->last_name}}</strong>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <a href="/profile/edit"><i class="fa fa-user-edit"></i> Изменить профиль</a>
                </li>
                <li class="list-group-item">
                    <a href="/profile/myads"><i class="fa fa-file-spreadsheet"></i> Мои объявления</a>
                </li>
                @if(Auth::user()->isAdmin())
                    <li class="list-group-item">
                        <a href="{{route('adminPanel')}}" class="text-danger" target="_blank"><i class="fa fa-user-crown"></i> Панель администратора</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
    <div class="adsense">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Right -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-6989231873707017"
             data-ad-slot="6711291544"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div>