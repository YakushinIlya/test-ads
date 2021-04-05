@extends('layouts.ads')

@section('content')
<form method="POST" action="{{ route('password.update') }}" class="offset-md-4">
    @csrf
    <h1 class="h3 text-center">{{__('Новый пароль')}}</h1>

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="form-group">
        <label for="email" class="ol-form-label text-md-right">{{ __('Ваш e-mail адрес') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
    </div>

    <div class="form-group">
        <label for="password" class="col-form-label text-md-right">{{ __('Новый пароль') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Повтор пароля') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="form-group mb-0">
            <button type="submit" class="btn btn-danger">
                {{ __('Сменить пароль') }}
            </button>
    </div>
</form>
@endsection

@section('footer')
    @include('front.footer')
@endsection