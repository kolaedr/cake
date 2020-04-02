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
        <h1>Checkout</h1>
    <div class="cart-modal">
        @include('site.cart.cart')
    </div>

    @if (session('cart'))
        @if (!Auth::check())
            <p>Please login</p>
        @else
        <form action="/checkout" class="" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary  pl-5 pr-5 font-weight-bold">{{__('Checkout')}}</button>
        </form>
        @endif
    @endif

    </div>
    <div class="col-2">
        @include('site.user._aside')
    </div>
</div>


@endsection



@section('js')

@endsection
