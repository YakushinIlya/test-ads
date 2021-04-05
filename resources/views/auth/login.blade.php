@extends('layouts.ads')

@section('title'){{ __('Вход в профиль market-cars.ru') }}@endsection

@section('content')
    <form method="POST" action="{{ route('login') }}" class="offset-md-4">
        @csrf
        <h1 class="h3 text-center">{{__('Вход')}}</h1>
        <div class="form-group">
            <label for="email" class="col-form-label text-md-right">{{ __('E-mail адрес') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>

        <div class="form-group">
            <label for="password" class="col-form-label text-md-right">{{ __('Пароль') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        </div>

        <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} checked>

                    <label class="form-check-label" for="remember">
                        {{ __('Запомнить меня') }}
                    </label>
                </div>
        </div>

        <div class="form-group mb-0">
                <button type="submit" class="btn btn-danger">
                    {{ __('Войти') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif
                <a class="btn btn-link" href="{{ route('register') }}">
                    {{ __('Регистрация') }}
                </a>
        </div>
    </form>
@endsection

@section('footer')
    @include('front.footer')
@endsection