<div class="side-product">
    <ul>
        @foreach ($categories as $item)
            <li><a href="{{route('category.single', $item->slug)}}" class="{{Request::is('category/'.$item->slug)?'active':''}}">{{$item->name}}</a>
            {{-- @if (Request::is('/products'.$item->products)) --}}
            <ul>
                @foreach ($item->products as $item)
                    <li >
                        <a href="{{route('products.single', $item->slug)}}" class="{{Request::is('products/'.$item->slug)?'active':''}}">{{$item->name}}</a>
                    </li>
                @endforeach
            </ul></li>
            {{-- @endif --}}
        @endforeach
    </ul>
</div>
