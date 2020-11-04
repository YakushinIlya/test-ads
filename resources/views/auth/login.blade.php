@extends('layouts.ads')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="offset-md-3">
        @csrf
        <h1 class="h3 text-center">{{__('Вход')}}</h1>
        <div class="form-group">
            <label for="email" class="col-form-label text-md-right">{{ __('E-mail адрес') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
        </div>

        <div class="form-group">
            <label for="password" class="col-form-label text-md-right">{{ __('Пароль') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
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
                <button type="submit" class="btn btn-primary">
                    {{ __('Войти') }}
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Забыли пароль?') }}
                    </a>
                @endif
        </div>
    </form>
@endsection
