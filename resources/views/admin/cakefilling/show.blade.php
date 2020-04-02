@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1> Cake Fillings: {{$CakeFillings->name}}</h1> --}}
@stop

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


    <div class="card">
        <div class="card-header">
          <h3 class="card-title">
            Cake Fillings: <strong>{{$CakeFillings->name}}</strong>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <dl>
            <dt>Price</dt>
            <dd>{{$CakeFillings->price}} UAH</dd>
            <dt>Describe</dt>
            <dd>{!! $CakeFillings->describe !!}</dd>
            <dt>Images</dt>
            <dd><img src="{{$CakeFillings->image}}" alt="" style="width: 10em"></dd>
            <dt>Visible for users</dt>
            <dd>{!! $CakeFillings->visible == 1 ? "Visible": "Not visible to site" !!}</dd>
          </dl>
        </div>
        <!-- /.card-body -->
      </div>

    <a href="{{route('cake-fillings.index')}}" class="btn btn-primary ml-3">back</a>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

        @stop
@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
@endsection

