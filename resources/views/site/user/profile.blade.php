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
@if (session('success'))
<div class="alert alert-success">{{session('success')}}</div>
@endif

<div class="container row">

    <div class="col-10 user__account jc-center">
        <form action="{{route('profile-update', Auth::user()->id)}}" method="POST" >
            @csrf
        <div class="col-8">
            <div class="form-item">
                <label for="user">{{__('user_name')}}</label>
            <input type="text" name="user" id="user" placeholder="{{__('Your name')}}" value="{{Auth::user()->name??''}}" disabled>
            </div>
            <div class="form-item">
                <label for="phone">{{__('user_phone')}}</label>
                <input type="text" name="phone" id="phone" placeholder="{{__('Your phone')}}"  value="{{Auth::user()->phone??''}}" >
            </div>
            <div class="form-item">
                <label for="email">{{__('user_email')}}</label>
                <input type="text" name="email" id="email" placeholder="{{__('Your email')}}"  value="{{Auth::user()->email??''}}" disabled>
            </div>
            <div class="form-item">
                <label for="viber">{{__('user_viber')}}</label>
                <input type="text" name="viber" id="viber" placeholder="{{__('Your viber')}}"  value="{{Auth::user()->viber??''}}" >
            </div>

        </div>
        <div class="col-8 ">
            <div class="form-item">
                <label for="street">{{__('delivery_street')}}</label>
                <input type="text" name="street" id="street" placeholder="Sobornyi" value="{{Auth::user()->street??''}}" >
            </div>
            <div class="row col-12 jc-between">
                <div class="form-item col-4">
                    <label for="build">{{__('delivery_build')}}</label>
                    <input type="text" name="build" id="build" placeholder="11" value="{{Auth::user()->build??''}}">
                </div>
                <div class="form-item col-4">
                    <label for="room">{{__('delivery_room')}}</label>
                    <input type="text" name="room" id="room" placeholder="123"  value="{{Auth::user()->room??''}}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{__('Save profile')}}</button>
        </form>
        </div>

    </div>
    <div class="col-2">
        @include('site.user._aside')
    </div>
</div>


@endsection



@section('js')

@endsection
