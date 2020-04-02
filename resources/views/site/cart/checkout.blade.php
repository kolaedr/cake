@extends('layouts.app')

@section('content')

<div class="container">
<h1>Checkout</h1>
<div class="cart-modal">
    @include('cart.cart')
</div>

@if (session('cart'))
    @if (!Auth::check())
        <p>Please login</p>
    @else
     <form action="/checkout" class="" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary  pl-5 pr-5 font-weight-bold">Checkout</button>
    </form>
    @endif
@endif


</div>
@endsection


@section('css')
@stop

@section('js')

@stop

