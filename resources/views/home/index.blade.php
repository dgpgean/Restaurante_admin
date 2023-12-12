@vite('resources/css/home.css')

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div id="body">
        @include('partials.card_progress')
        @include('partials.card_progress')
        @include('partials.card_progress')
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/home.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
