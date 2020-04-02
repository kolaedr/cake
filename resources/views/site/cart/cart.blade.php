@if(session('cart'))
{{-- {{dump(session('cart'))}} --}}
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>image</th>
            <th>price</th>
            <th>Count</th>
            <th>Totac amount</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach (session('cart') as $item)
            <tr>
                <td >{{$item['name']}}</td>
                <td ><img src="{{$item['image']}}" alt=""></td>
                <td >{{$item['price']}}</td>
                <td><input type="number" value="{{$item['qty']}}" class="product_qty" data-id="{{$item['id']}}"></td>
                <td>{{$item['price']*$item['qty']}}</td>
                {{-- <td><a href="#" class="btn btn-outline-dark  single-delete pl-4 pr-4" data-id="">Del</a><i class="fa fa-plus" aria-hidden="true"></i></td> --}}
                <td><button class="remove btn btn-link" data-id="{{$item['id']}}"><i class="fa fa-trash mr-2" aria-hidden="true"></i>Delete</button></td>
            </tr>
        @endforeach
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">Total: {{session('totalPrice')}}</td>
            <a href="#" class="clear-cart">clear</a>
        </tr>
    </tfoot>

    </tbody>
</table>
@else
    <p>Cart empty</p>
@endif


