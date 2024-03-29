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
    <h3>{{$product->name}}</h3>
    <ul>
    <li>{{$product->prise}}
        <form action="" class="col-8 add-to-cart">
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <input type="hidden" name="qty" value="1">
        <button type="submit" class="btn btn-primary add-to-cart">Add to cart</button>
        </form>
    </li>
        <li>{{$product->describe}}</li>
        <li><img src="{{$product->image}}" alt=""></li>
    </ul>
   </div>



</div>

@endsection



@section('js')
<script>

</script>
@endsection
