


@extends('adminlte::page')

@section('title', __('lang'))

@section('content_header')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@stop

@section('content')
<div id="app">

    @include('translation::nav')
    @include('translation::notifications')

    @yield('body')

</div>
@endsection

@section('css')
<link rel="stylesheet" href="/vendor/translation/css/main.css">
@stop

@section('js')
<script src="/vendor/translation/js/app.js"></script>
@stop
