@extends('layouts.main')

@section('content')

<div class="container main row">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-2">
        @include('site.home.product._aside')
    </div>
    <div class="col-10">
    {{-- <h3>{{$product->name}}</h3> --}}
    <ul>
        @foreach ($products->products as $item)
        <li><strong><a href="{{route('products.single', $item->slug)}}">{{$item->name}}</a></strong> ({{$item->categories[0]->name}}) </li>
        <li>{{$item->prise}}</li>
        <li>{{$item->describe}}</li>
        <li><img src="{{$item->image}}" alt="" style="width: 5em"></li>
        @endforeach
    </ul>
    </div>
   {{-- @foreach ($products as $item)
    <h5><a href="{{route('products.single', $item->slug)}}">{{$item->name}}</a></h5>
        <h6>{{$item->price}}</h6>

   @endforeach --}}

</div>

@endsection



@section('js')

@endsection
