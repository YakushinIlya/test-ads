@extends('layouts.ads')

@section('content')
        <div class="offset-md-4">
            <div class="card">

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('На ваш e-mail была отправлена новая ссылка для подтверждения.') }}
                        </div>
                    @endif

                    <p>{{ __('Вам необходимо подтвердить свой e-mail указанный при регистрации:') }} <strong>{{Auth::user()->email}}</strong>
                        <br>
                        {{ __('Если вы не получали письмо содержащее ссылку для подтверждения, запросите его повторно.') }}</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-success btn-block">{{ __('Отправить письмо на e-mail') }}</button>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('footer')
    @include('front.footer')
@endsection