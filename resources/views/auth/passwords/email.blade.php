@extends('layouts.ads')

@section('title'){{ __('Сброс пароля market-cars.ru') }}@endsection

@section('content')
<form method="POST" action="{{ route('password.email') }}" class="offset-md-4">
    @csrf
    <h1 class="h3 text-center">{{__('Сброс пароля')}}</h1>
    <div class="form-group">
        <label for="email" class="col-form-label text-md-right">{{ __('Ваш e-mail адрес') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    </div>
    <div class="form-group mb-0">
            <button type="submit" class="btn btn-danger">
                {{ __('Сбросить пароль') }}
            </button>
    </div>
</form>
@endsection

@section('footer')
    @include('front.footer')
@endsection