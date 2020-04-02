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
   Cackes

   @foreach ($cakes as $item)
        <h5>{{$item->name}}</h5>
   @endforeach
</div>

@endsection



@section('js')

@endsection
