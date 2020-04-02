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

    <div class="col-8 ">
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
    <div class="col-4">
        <div class="col-12">
            <div class="form-item">
                <label for="name">{{__('user_name')}}</label>
                <input type="text" name="name" id="name" class="@error('name') error-alert  @enderror" placeholder="Put user name" value="{{Auth::user()->name??''}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-item">
                <label for="phone">{{__('user_phone')}}</label>
                <input type="text" name="phone" id="phone" class="user-phone  @error('phone') error-alert  @enderror" placeholder="{{__('Your phone')}}"  value="{{Auth::user()->phone??''}}" required>
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-12 row">
            <div class=" col-12" >
                <p>{{__('delivery')}}</p>

                <input type="radio" name="delivery" id="delivery" placeholder="Sobornyi" checked value="pickup">
                <label for="delivery">{{__('delivery_from_cafe')}}</label><br>
                <input type="radio" name="delivery" id="delivery_to_address" placeholder="Sobornyi"  value="delivery" data-price="150">
                <label for="delivery_to_address">{{__('delivery_to_address')}}</label>
            </div>
            <div class="col-12  delivery-info mt-2">
                <p class="">{{__('delivery_info_text')}}</p>
                <div class="form-item col-12">
                    <label for="street">{{__('delivery_street')}}</label>
                    <input type="text" name="street" id="street" placeholder="Sobornyi" value="{{Auth::user()->street??''}}">
                </div>
                <div class="form-item col-6">
                    <label for="build">{{__('delivery_build')}}</label>
                    <input type="text" name="build" id="build" placeholder="11" style="width: 4em" value="{{Auth::user()->build??''}}">
                </div>
                <div class="form-item col-6">
                    <label for="room">{{__('delivery_room')}}</label>
                    <input type="text" name="room" id="room" placeholder="123" style="width: 4em" value="{{Auth::user()->room??''}}">
                </div>
            </div>
            <div class="col-12 cafe-info mt-2 show">
            <p>{{__('cafe_address')}}</p>
            </div>


        </div>
    </div>
</div>


@endsection



@section('js')

@endsection
