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



    </div>
    <div class="col-4">
        @if (session('cart'))
            {{-- @if (!Auth::check())
                <p>Please login</p>
            @else --}}
            <form action="/checkout" class="" method="POST">
                @csrf
                <div class="col-12">
                    {{-- {{dd(session('booking'))}} --}}
                    <p>{{__('your_booking_time')}}: </p>
                    <input type="hidden" name="booking" id="" value="{{session('booking')?session('booking'):\Carbon\Carbon::now(new DateTimeZone('Europe/Kiev'))->format('Y-m-d')}}" class="@error('booking') error-alert  @enderror">

                    @if (!session('booking'))
                        <input type="date" name="date" id="booking" class="datepicker "
                        value="{{session('booking')?Str::before(session('booking'), ' '):\Carbon\Carbon::now(new DateTimeZone('Europe/Kiev'))->format('Y-m-d')}}"
                        @if (session('booking'))
                            disabled
                        @endif
                        >
                        {{-- <input type="date" name="date" id="booking" class="datepicker"> --}}
                        <input type="time" name="time" id="" list='time' disabled value="{{session('booking')?Str::after(session('booking'), ' '):\Carbon\Carbon::now(new DateTimeZone('Europe/Kiev'))->format('H:i')}}">

                        <datalist id="time">
                            @for ($h = 7; $h <= 20; $h++)
                                @for ($m = 0; $m <= 45; $m+=15)
                                <option value="{{$h}}:{{$m==0?'00':$m}}">
                                @endfor
                            @endfor
                        </datalist>
                        {{-- <div id="data-picker"></div> --}}
                        @error('booking')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @endif

                    <strong>{{session('booking')?\Carbon\Carbon::parse(session('booking'))->format('Y-m-d H:i'):''}}</strong>
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
                        <div class="row">
                            <div class="form-item col-6">
                                <label for="build">{{__('delivery_build')}}</label>
                                <input type="text" name="build" id="build" placeholder="11" style="width: 4em" value="{{Auth::user()->build??''}}">
                            </div>
                            <div class="form-item col-6">
                                <label for="room">{{__('delivery_room')}}</label>
                                <input type="text" name="room" id="room" placeholder="123" style="width: 4em" value="{{Auth::user()->room??''}}">
                            </div>
                        </div>

                    </div>
                    <div class="col-12 cafe-info mt-2 show">
                    <p>{{__('cafe_address')}}</p>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary  jc-center">{{__('Checkout')}}</button>

            </form>
            {{-- @endif --}}
        @endif

    </div>
</div>


@endsection



@section('js')

@endsection
