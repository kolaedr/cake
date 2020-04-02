@extends('layouts.main')

@section('content')

<div class="container row jc-center">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
   <h1 style="font-size: 15em">401 soryan</h1>
</div>

@endsection
