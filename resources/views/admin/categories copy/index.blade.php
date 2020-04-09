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
    <h1>Cake Fillings</h1>
    <a href="{{route('cake-fillings.create')}}" class="btn btn-primary"><i class="fas fa-plus nav-icon mr-3"></i>Add new</a>
</div>

@stop

@section('content')
{{$CakeFillings->links()}}
<table class="table  table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>PRICE</th>
            <th>DESCRIBE</th>
            <th>SLUG</th>
            <th>IMAGE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($CakeFillings as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="{{route('cake-fillings.edit', $item->id)}}">{{$item->name}}</a></td>
            <td>{{$item->price}} UAH</td>
            <td>{!! Str::words($item->describe, 13, ' ...') !!}</td>
            <td>{{$item->slug}}</td>
            <td><img src="{{$item->image}}" class="images-prod-admin" style="width:150px" /></td>
            <td class="d-inline-flex">
                <a href="{{route('cake-fillings.edit', $item->id)}}" class="text-secondary mr-3" title="Edit"><i class="fas fa-edit nav-icon"></i></a>
                {{-- <a href="#" class="text-danger m-1 delete" title="Delete" data-id='{{$item->id}}'><i class="fas fa-trash-alt nav-icon"></i></a> --}}
                {{-- <a href="{{route('cake-fillings.destroy', $item->id)}}" class="text-danger m-1 delete" title="Delete" data-id='{{$item->id}}'><i class="fas fa-trash-alt nav-icon"></i></a> --}}
                <form action="/admin/cake-fillings/{{$item->id}}" method="POST">
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
        $('.table').DataTable();


        </script>
@stop
