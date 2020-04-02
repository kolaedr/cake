@extends('adminlte::page')

@section('title', $title)

@section('content_header')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row justify-content-between">
    <h1>{{$title}}</h1>
    {{-- <a href="{{route('orders.create')}}" class="btn btn-primary"><i class="fas fa-plus nav-icon mr-3"></i>Add new</a> --}}
</div>
@stop

@section('content')
{{$Orders->links()}}
<table class="table  table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>USER</th>
            <th>CAKE</th>
            <th>DATE</th>
            <th>PRICE</th>
            <th>STATUS</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($Orders as $item)
        <tr>
            <td>{{++$loop->index}}</td>
            <td>
                <a href="{{route('orders.edit', $item->id)}}">{{$item->users->name}}</a> <br>
                <a href="tel:+{{$item->users->phone}}">{{$item->users->phone}}</a><br>
                {{-- <strong>st. {{$item->users->deliveries[0]->street}}, </strong> --}}
                <small>st. {{$item->users->deliveries[0]->street??''}}, build: {{$item->users->deliveries[0]->build??''}} room:{{$item->users->deliveries[0]->room??''}}</small>
            </td>
            <td>
               <ul>
                    @foreach ($item->cakes as $it)
                    <li> {{ $it->tierOne->name}}</li>
                    {{-- <li> {{ $cake[$item->cake_filling_lavel_1_id]->name}}</li> --}}
                    {{-- {{dump($it)}} --}}
                    @endforeach
                </ul>

            </td>
            <td>{{Carbon\Carbon::createFromTimestamp($item->booking)->format('Y-m-d H:i')}}</td>
            <td>
                {{$item->total_amount}}

            </td>
            <td>{{$item->statuses->name}}</td>
            <td class="d-inline-flex">
                <a href="{{route('orders.edit', $item->id)}}" class="text-secondary mr-3" title="Edit"><i class="fas fa-edit nav-icon"></i></a>
                {{-- <a href="#" class="text-danger m-1 delete" title="Delete" data-id='{{$item->id}}'><i class="fas fa-trash-alt nav-icon"></i></a> --}}
                {{-- <a href="{{route('orders.destroy', $item->id)}}" class="text-danger m-1 delete" title="Delete" data-id='{{$item->id}}'><i class="fas fa-trash-alt nav-icon"></i></a> --}}
                <form action="/admin/orders/{{$item->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="#" class="text-danger m-1 delete" title="Delete" onclick="this.closest('form').submit();return false;"><i class="fas fa-trash-alt nav-icon"></i></a>
                    {{-- <button class="btn btn-danger"><i class="fas fa-trash-alt nav-icon"></i></button> --}}
                </form>
            </td>
        </tr>

        @endforeach


    </tbody>
</table>

@endsection

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        // $('.table').DataTable();


        </script>
@stop
