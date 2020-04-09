@include('layouts.header')

<main class="container">
    {{-- <main class="container-full"> --}}
    @yield('content')
</main>

@include('layouts.footer')
