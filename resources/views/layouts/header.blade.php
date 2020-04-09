<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title??'Vanilka' }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/app-custom.css') }}" rel="stylesheet"> --}}
</head>
<body>
<header>
<nav class="container">
    

    <div class="nav-brand">
        <a href="/"><img src="/images/logo.png" alt="Vanilka" srcset=""></a>
    </div>
    <div class="nav-menu">
        <div class="nav-icon">
            <i class="fa fa-bars"></i>
        </div>
        <div class="nav-menu-list">
            {{-- <ul>
                @foreach (config('menu.MENU_ITEM', '') as $url=>$name)
                    <li class="{{(Request::is($url)?'active':'')}}"><a href="{{Str::start($url, '/')}}" class=" {{(Request::is($url)?'active':'')}}" title="{{$name}}">{{$name}}</a></li>
                @endforeach
                <li>
                    <a href="/cart" class=" cart-link" title="{{$name}}">
                        {{__('cart')}}
                        <span class="cart-count"></span>
                    </a>
                </li>
            </ul> --}}
            @foreach (config('menu.MENU_ITEM', '') as $url=>$name)
                <a href="{{Str::start($url, '/')}}" class=" {{(Request::is($url)?'active':'')}}" title="{{$name}}">{{$name}}</a>
            @endforeach
        </div>
    </div>
    <div class="nav-users">
    
    {{-- <span class="user-icon"><i class="fa fa-user "></i></span> --}}
        @guest
        <div class="user-icon">
            <i class="fa fa-sign-in-alt log-in"></i>
        </div>
            {{-- <span class="dropdown"><i class="fa fa-user "></i><span>{{ __('User') }}</span></span> --}}
            {{-- <span class="plastic"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></span> --}}
            <div class="dropdown-content">
            <div class="dropdown-content-body">
                <span class="close fas fa-times-circle"></span>
                <ul class="row jc-center">
                    <li class="login-selector active">{{ __('Login') }}</li>
                    <li class="registration-selector">{{ __('Registration') }}</li>

                </ul>
                <div class="login-item col-12 dropdown-open">
                    {{-- <a href="{{ route('auth.social', 'facebook') }}" title="Facebook">
                        <i class="fas fa-2x fa-facebook-square"></i>
                    </a> --}}
                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                        <a href="{{route('auth.social', 'facebook')}}" class="btn btn-primary">Login with Facebook</a>
                        </div>
                    </div>
                    @include('layouts._login-form')
                </div>
            <div class="registration-item col-12 ">
                @include('layouts._registration-form')
            </div>
        </div>
        </div>
        @else
        <div class="user-icon">
            <i class="fa fa-user "></i>
        </div>
        <div class="menu-user__item">
            <span  class="menu-user">{{ Str::after(Auth::user()->name, ' ') }} </span>
            <div class="menu-user-content">
            {{-- @include('site.user._aside') --}}
                <a href="{{ route('account') }}" class="{{(Request::is('/user/account')?'active':'')}}"><i class="fas fa-user mr-2"></i>{{__('Profile')}}</a>
                <a href="{{ route('orders') }}" class="{{(Request::is('/user/orders')?'active':'')}}"><i class="fas fa-list-ul mr-2"></i>{{__('Orders')}}</a>
                <a href="{{ route('checkout') }}" class="{{(Request::is('/checkout')?'active':'')}}"><i class="fas fa-shopping-bag mr-2"></i>{{__('Checkout')}}</a>
                <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                        {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
            </div>
        </div>

        {{-- <div class="menu-user__item">
            <span  class="menu-user">{{ Str::after(Auth::user()->name, ' ') }} </span>
            <div class="menu-user-content">
                <ul>
                    <li><a href="{{ route('account') }}"><i class="fas fa-user mr-2"></i>{{__('Profile')}}</a></li>
                    <li><a href="{{ route('orders') }}"><i class="fas fa-list-ul mr-2"></i>{{__('Orders')}}</a></li>
                    <li><a href="{{ route('checkout') }}"><i class="fas fa-shopping-bag mr-2"></i>{{__('Checkout')}}</a></li>
                    <li>
                        <a class="" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                        {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div> --}}
        @endguest
    </div>

   
</nav>


</header>

@section('js')
<script>

</script>

@endsection
