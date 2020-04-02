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
    <h1>Statuses</h1>
    <a href="{{route('statuses.create')}}" class="btn btn-primary"><i class="fas fa-plus nav-icon mr-3"></i>Add new</a>
</div>

@stop

@section('content')
{{$Statuses->links()}}
<table class="table  table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>NAME_RU</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($Statuses as $item)
        <tr>
            <td>{{$item->id}}</td>
            <td><a href="{{route('statuses.edit', $item->id)}}">{{$item->name}}</a></td>
            <td>{{$item->name_ru}}</td>
            <td class="d-inline-flex">
                <a href="{{route('statuses.edit', $item->id)}}" class="text-secondary mr-3" title="Edit"><i class="fas fa-edit nav-icon"></i></a>
                {{-- <a href="#" class="text-danger m-1 delete" title="Delete" data-id='{{$item->id}}'><i class="fas fa-trash-alt nav-icon"></i></a> --}}
                {{-- <a href="{{route('statuses.destroy', $item->id)}}" class="text-danger m-1 delete" title="Delete" data-id='{{$item->id}}'><i class="fas fa-trash-alt nav-icon"></i></a> --}}
                <form action="/admin/statuses/{{$item->id}}" method="POST">
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
