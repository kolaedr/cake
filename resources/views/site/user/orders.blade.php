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

    <div class="col-10 user__account">
        <strong>{{__('Orders')}}</strong>
        <table>
            <thead>
                <tr>
                    <th>{{__('order_cake_name')}}</th>
                    <th>{{__('order_cake_price')}}</th>
                    <th>{{__('order_cake_booking')}}</th>
                    <th>{{__('order_status')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td>
                            {{-- {{$item->cakes[0]->tierOne->name}} --}}
                            <ol>
                                @foreach ($item->cakes as $cake)
                                <li>{{$cake->tierOne->name}}</li>
                                @endforeach
                                @foreach ($item->products as $prod)
                                <li>{{$prod->name}}</li>
                                @endforeach
                            </ol>
                        </td>
                        <td>{{$item->total_amount}}</td>
                        <td>{{$item->booking}}</td>
                        {{-- <td>{{Carbon\Carbon::createFromTimestamp($item->booking)->format('Y-m-d H:i')}}</td> --}}
                        <td>{{$item->statuses->name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <div class="col-2">
        @include('site.user._aside')
    </div>
</div>


@endsection



@section('js')

@endsection
