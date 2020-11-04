@extends('layouts.ads')

@section('title'){{$title??config('ads.title')}}@endsection
@section('description'){{$description??config('ads.description')}}@endsection
@section('keywords'){{$keywords??config('ads.keywords')}}@endsection

@section('content')
    <div class="profile mb-5">
        <div class="profile__body">
            {!! $content ?? 'No content' !!}
        </div>
    </div>
@endsection

@section('sidebar')
    @include('front.sidebarProfile', ['user'=>Auth::user()])
@endsection

@section('footer')
    @include('front.footer')
@endsection