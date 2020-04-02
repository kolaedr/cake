@extends('layouts.main')

@section('content')
@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="container row">

    <div class="col-10 user__account">
        Cahge settings

    </div>
    <div class="col-2">
        @include('site.user._aside')
    </div>
</div>


@endsection



@section('js')

@endsection
