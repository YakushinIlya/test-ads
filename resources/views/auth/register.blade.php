@extends('layouts.ads')

@section('content')

<form method="POST" action="{{ route('register') }}" class="offset-md-3">
    @csrf

    <div class="form-group">
        <label for="first_name" class="col-form-label text-md-right">{{ __('Имя') }}</label>

            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

            @error('first_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="form-group">
        <label for="last_name" class="col-form-label text-md-right">{{ __('Фамилия') }}</label>

            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name">

            @error('last_name')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="form-group">
        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail адрес') }}</label>

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="form-group">
        <label for="password" class="col-form-label text-md-right">{{ __('Пароль') }}</label>

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-form-label text-md-right">{{ __('Повторить пароль') }}</label>

            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
    </div>

    <div class="form-group mb-0">
            <button type="submit" class="btn btn-primary">
                {{ __('Зарегистрироваться') }}
            </button>
    </div>
</form>

@endsection
