{{-- <div class="cart-modal">
    @include('site.cart.cart')
</div> --}}
    <footer class="footer">
        @yield('footer')
    </footer>

    @yield('js')
    {{-- <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script> --}}
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- <script src="{{ asset('js/app-custom.js') }}" defer></script> --}}
    </body>
</html>
