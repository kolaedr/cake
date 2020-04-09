@extends('adminlte::page')

@section('title', __("default_settings"))

@section('content_header')
@if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
@endif
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
    <h1>Limits orders per day</h1>
    {{-- <a href="{{route('orders.create')}}" class="btn btn-primary"><i class="fas fa-plus nav-icon mr-3"></i>Add new</a> --}}
</div>
@stop

@section('content')
<table class="table  table-hover">
    <thead  class="thead-light">
        <tr>
            <th>default_count</th>
            <th>cake_count</th>
            <th>cheesecake_count</th>
            <th>cupcake_count</th>
            {{-- <th>PRICE</th>
            <th>STATUS</th> --}}
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
{{-- {{dd($Orders[0]->products)}} --}}

        <tr>
        @foreach ($defaultSetting as $item)
        {!! Form::model(
            $defaultSetting,
            ['route'=>['order-default-settings.update', $item->id], 'method'=>'put', 'class'=>'']) !!}
            <td>
                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    {!! Form::text('default_count', $item->default_count, ['class'=>'form-control', 'placeholder'=>'User name']) !!}
                </div>
            </td>
            <td>
                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    {!! Form::text('cake_count', $item->cake_count, ['class'=>'form-control', 'placeholder'=>'User name']) !!}
                </div>
            </td>
            <td>
                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    {!! Form::text('cheesecake_count', $item->cheesecake_count, ['class'=>'form-control', 'placeholder'=>'User name']) !!}
                </div>
            </td>
            <td>
                <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                    {!! Form::text('cupcake_count', $item->cupcake_count, ['class'=>'form-control', 'placeholder'=>'User name']) !!}
                </div>
            </td>

            <td>
                {!! Form::submit('Change', ['class'=>'btn btn-primary btn-block']) !!}
            </td>



        @endforeach
        </tr>
        {!! Form::close() !!}

    </tbody>
</table>

@endsection

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <style>

</style>
@stop

@section('js')
    <script>
        // $('.table').DataTable();

        if (document.querySelector('.alert-success')) {
                    setTimeout(() => {
                        document.querySelector('.alert-success').remove();
                    }, 4000);
                }
        </script>
@stop
