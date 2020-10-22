@extends('layouts.ads')

@section('title'){{$title??config('ads.title')}}@endsection
@section('description'){{$description??config('ads.description')}}@endsection
@section('keywords'){{$keywords??config('ads.keywords')}}@endsection

@section('search')
    @include('front.search')
@endsection

@section('content')
    {!! $content ?? 'No content' !!}
@endsection

@section('sidebar')
    @include('front.sidebarProfile', ['user'=>Auth::user()])
@endsection

@section('footer')
    @include('front.footer')
@endsection