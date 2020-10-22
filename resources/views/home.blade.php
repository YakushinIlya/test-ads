@extends('layouts.ads')

@section('title'){{$title??config('ads.title')}}@endsection
@section('description'){{$description??config('ads.description')}}@endsection
@section('keywords'){{$keywords??config('ads.keywords')}}@endsection

@section('search')
    @include('front.search')
@endsection

@section('content')
    @include('front.body', ['content' => $content])
@endsection

@section('sidebar')
    @include('front.sidebar')
@endsection

@section('footer')
    @include('front.footer')
@endsection