<div class="profile mb-5">
    <div class="profile__body">
        <router-view :data='@json(Auth::user())'></router-view>
    </div>
</div>
