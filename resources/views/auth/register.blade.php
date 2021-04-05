@extends('layouts.ads')

@section('title'){{ __('Регистрация профиля market-cars.ru') }}@endsection

@section('content')
<form method="POST" action="{{ route('register') }}" class="offset-md-4">
    @csrf
    <h1 class="h3 text-center">{{__('Регистрация')}}</h1>
    <div class="form-group">
        <label for="first_name" class="col-form-label text-md-right">{{ __('Имя') }}</label>

            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

    </div>

    <div class="form-group">
        <label for="last_name" class="col-form-label text-md-right">{{ __('Фамилия') }}</label>

            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

    </div>

    <div class="form-group">
        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail адрес') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

    </div>

    <div class="form-group">
        <label for="password" class="col-form-label text-md-right">{{ __('Пароль') }}</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Повторить пароль') }}</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="form-group mb-0">
            <button type="submit" class="btn btn-danger">
                {{ __('Зарегистрироваться') }}
            </button>
            <a class="btn btn-link" href="{{ route('login') }}">
                {{ __('Вход') }}
            </a>
    </div>
</form>

@endsection

@section('footer')
    @include('front.footer')
@endsection