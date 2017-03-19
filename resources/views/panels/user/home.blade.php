@extends('layouts.main')

@section('title')
    Home page
@endsection

@section('navigation')
    @include('partials.navigation')
@endsection

@section('status')
    @include('partials.status-panel')
@stop

@section('content')
    home
@stop