<aside class="user__account">
    <div class="user__menu-list">
        <ul>
            <li class="label "><strong>{{__("Your list")}}</strong></li>
            <li class="{{(Request::is('user/checkout')?'active':'')}}"><a href="{{route('checkout')}}">{{__('Checkout')}}</a></li>
            <li class="{{(Request::is('user/orders')?'active':'')}}"><a href="{{route('orders')}}">{{__('User orders')}}</a></li>
            <li class="label"><strong>{{__("Settings")}}</strong></li>
            <li class="{{(Request::is('user/profile')?'active':'')}}"><a href="{{route('profile')}}">{{__('Profile')}}</a></li>
            <li class="{{(Request::is('user/change-settings')?'active':'')}}"><a href="{{route('change-settings')}}">{{__('Chage settings')}}</a></li>
        </ul>
    </div>
</aside>
