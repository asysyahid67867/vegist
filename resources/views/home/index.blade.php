@extends('layouts.app')

@section('title', 'Home | Vegist')

@section('styles')
    {{--  --}}
@endsection

@section('hero')

@endsection

@section('content')
    @include('home.corousel')
    @include('home.about')
    @include('home.feature')
    @include('home.product')
    @include('home.visit')
@endsection
