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
<nav class="row jc-between ai-center">
<div class="nav-brand col-2">
    <a href="/"><img src="/images/logo.png" alt="Vanilka" srcset=""></a>
</div>
<div class="nav-menu ai-center jc-center col-8">
    <ul>
        @foreach (config('menu.MENU_ITEM', '') as $url=>$name)
            <li><a href="{{Str::start($url, '/')}}" class=" {{(Request::is($url)?'active':'')}}" title="{{$name}}">{{$name}}</a></li>
        @endforeach
      </ul>
</div>
<div class="nav-users col-2 ">
        @guest
        <div class="">
            <span class="dropdown">{{ __('User') }}</span>
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
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-item">
                            <label for="username" class="col-12 ">{{ __('E-mail or Phone:') }}</label>

                            <div class="col-12">
                                <input id="username" type="username" class="col-10 @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-item">
                            <label for="password" class="col-10 ">{{ __('Password') }}</label>

                            <div class="col-12">
                                <input id="password" type="password" class="col-10 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-item">
                            <div class="col-12 ">
                                <div class=" row">
                                    <input class="col-1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="col-10 btn-link" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-item row mb-0">
                            <div class="col-md-8 ">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
            </div>
            <div class="registration-item col-12 ">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-item row">
                        <label for="name" class="col-10 ">{{ __('Name') }}</label>

                        <div class="col-12">
                            <input id="name" type="text" class="col-10 @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-item row">
                        <label for="email" class="col-10 ">{{ __('E-Mail Address') }}</label>

                        <div class="col-12">
                            <input id="email" type="email" class="col-10 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-item row">
                        <label for="phone" class="col-10 ">{{ __('Phone') }}</label>

                        <div class="col-12">
                            <input id="phone" type="phone" class="col-10 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-item row">
                        <label for="password" class="col-10 ">{{ __('Password') }}</label>

                        <div class="col-12">
                            <input id="password" type="password" class="col-10 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-item row">
                        <label for="password-confirm" class="col-10 ">{{ __('Confirm Password') }}</label>

                        <div class="col-12">
                            <input id="password-confirm" type="password" class="col-10" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-item row mb-0">
                        <div class="col-12 ">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
        @else
        <div class="menu-user__item">
            <span  class="menu-user">{{ Auth::user()->name }} </span>
            <div class="menu-user-content">
            <ul>
                <li><a href="{{ route('account') }}"><i class="fas fa-user mr-2"></i>{{__('Profile')}}</a></li>
                <li><a href="{{ route('orders') }}"><i class="fas fa-list-ul mr-2"></i>{{__('Orders')}}</a></li>
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
          </div>
        @endguest
</div>

</nav>


</header>

@section('js')
<script>

</script>

@endsection
