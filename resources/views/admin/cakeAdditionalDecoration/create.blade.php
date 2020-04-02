@extends('adminlte::page')

@section('title', 'Add product')

@section('content_header')
    <h1>Add product</h1>
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
    {{-- <div style="height: 600px;">
        <div id="fm"></div>
    </div> --}}
    {!! Form::model($AdditionalDecorations, ['url'=>'admin/cake-additional-decorations','class'=>'col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10']) !!}
    {{-- {{Form::token()}} --}}
    @include('admin.cakeAdditionalDecoration._form')

    <div class="row align-items-center">
        {!! Form::submit('Add', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('cake-additional-decorations.index')}}" class="ml-3">back</a>
    </div>
    {!! Form::close() !!}
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

    <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
    if (document.querySelector('#describe-product')) {
        CKEDITOR.replace( 'describe-product', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'} );
        };

    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById('button-image').addEventListener('click', (event) => {
            event.preventDefault();

            window.open('/file-manager/fm-button', 'fm', 'width=900,height=600');
            });
        });

    // set file link
    function fmSetLink($url) {
        document.getElementById('image_label').value = $url;
    }
    </script>

    @stop
@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection
