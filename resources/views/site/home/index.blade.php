@extends('layouts.main')

@section('content')

<div class="container main">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   Hello
</div>

@endsection



@section('js')

@endsection