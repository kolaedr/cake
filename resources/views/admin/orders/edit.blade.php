@extends('adminlte::page')

@section('title', 'Dashboard')

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
    <h1>Edit Orders</h1>
    <form action="/admin/orders/{{$Orders->id}}" method="POST">
        @csrf
        @method('DELETE')
        {{-- <a href="#" class="text-danger m-1 delete" title="Delete" onclick="this.closest('form').submit();return false;"><i class="fas fa-trash-alt nav-icon"></i>Delete</a> --}}
        <button class="btn btn-danger"><i class="fas fa-trash-alt nav-icon mr-2"></i>Delete</button>
    </form>
</div>

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

    {!! Form::model(
        $Orders,
        ['route'=>['orders.update', $Orders->id], 'method'=>'put', 'class'=>'']) !!}
    <table class="table">
        <thead  class="thead-light">
            <tr>
                <th>USER</th>
                <th>CONTACT</th>
                <th>DATE</th>
                <th>PRICE</th>
                <th>STATUS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><a href="{{route('orders.edit', $Orders->id)}}">{{$Orders->users->name}}</a></td>
                <td>
                    <a href="tel:+{{$Orders->users->phone}}">{{$Orders->users->phone}}</a><br>
                    {{-- <strong>st. {{$item->users->deliveries[0]->street}}, </strong> --}}
                    @if ($Orders->delivery === 'pickup')
                    <small>In Cafe</small>
                    @else
                    <small>Delivery</small>
                    <small>st. {{$Orders->users->deliveries[0]->street??''}}, build: {{$Orders->users->deliveries[0]->build??''}} room:{{$Orders->users->deliveries[0]->room??''}}</small>
                    @endif

                </td>
                <td>{{Carbon\Carbon::createFromTimestamp($Orders->booking)->format('Y-m-d H:i')}}</td>

                <td>
                    {!! Form::text('total_amount', null, ['class'=>'form-control', 'placeholder'=>'User name']) !!}
                    </td>
                <td>
                    {!! Form::select('status_id', $statuses, $Orders->status_id, ['class'=>'form-control']) !!}
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    Admin comment:
                </td>
                <td colspan="3">
                    {!! Form::text('admin_comment', null, ['class'=>'form-control', 'placeholder'=>'Add our comment (only admin)']) !!}
                </td>
                <td>
                    {!! Form::submit('Save', ['class'=>'btn btn-primary btn-block']) !!}
                </td>
            </tr>
        </tbody>
    </table>
    {!! Form::close() !!}

    {{-- {!! Form::model(
                $Orders,
                ['route'=>['orders.update',
                $Orders->id],
                'method'=>'put',
                'class'=>'col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10']) !!}
    @include('admin.orders._form')
    <div class="row align-items-center">
        {!! Form::submit('Save', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('orders.index')}}" class="ml-3">back</a>
    </div>
    {!! Form::close() !!} --}}
{{-- {{dump($Orders->users->name)}} --}}
    <div class="card-deck">
        @foreach ($Orders->cakes as $item)
            <div class="card"  style="max-width: 20rem;">


              <div class="card-header">{{$item->tierOne->name}}
                <small class="text-muted">(price: {{$item->price}} UAH)</small><br>
                </div>
              <div class="card-body">
                {{-- <h5 class="card-title">Card title</h5> --}}
                <small class="text-muted">Filling</small><br>
                <p class="card-text">{{$item->tierOne->name}}</p>
                <small class="text-muted">Top decoration</small><br>
                <p class="card-text">{{$item->CakeTopDecorations->name}}</p>
                <small class="text-muted">Side decoration</small><br>
                <p class="card-text">{{$item->CakeSideDecorations->name}}</p>
                <small class="text-muted">Additional Decorations</small><br>
                @foreach ($item->AdditionalDecorations as $it)
                     <p class="card-text">{{$it->name}}</p>
                @endforeach
                <small class="text-muted">Additional Fillers</small><br>
                @foreach ($item->AdditionalFillers as $it)
                    <p class="card-text">{{$it->name}}</p>
                @endforeach
                <small class="text-muted">Text decoration:</small><br>
                <p class="card-text">{!! $item->text_decoration !!}</p>
                <small class="text-muted">Comment:</small><br>
                <p class="card-text">{!! $item->comments !!}</p>
                @if ($item->images!='')
                <small class="text-muted">My desing:</small><br>
                @foreach ($item->images as $it)
                     <img src="{{$it->url}}" class="card-img-top" alt="..." style="widght: 4em;">
                @endforeach

            @endif

              </div>
              <div class="card-footer">
                <form action="/admin/cakes/{{$item->id}}" method="POST" class="">
                    @csrf
                    @method('DELETE')
                    <a href="#" class=" text-danger m-1 delete" title="Delete" onclick="this.closest('form').submit();return false;"><i class="fas fa-trash-alt nav-icon mr-2"></i>Delete this position</a>
                </form>
              </div>
            </div>

        {{-- <div class="card col-3">
            <div class="card-header">
              <h3 class="card-title">
                Cake : <strong>{{$item->tierOne->name}}</strong>
              </h3>
              <form action="/admin/cakes/{{$item->id}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="#" class="text-danger m-1 delete" title="Delete" onclick="this.closest('form').submit();return false;"><i class="fas fa-trash-alt nav-icon"></i></a>
            </form>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <dl>
                <dt>Filling</dt>
                <dd>{{$item->tierOne->name}}</dd>
                <dt>Top decoration</dt>
                <dd>{{$item->CakeTopDecorations->name}}</dd>
                <dt>Side decoration</dt>
                <dd>{{$item->CakeSideDecorations->name}}</dd>
                <dt>Additional Decorations</dt>
                @foreach ($item->AdditionalDecorations as $it)
                    <dd>{{$it->name}}</dd>
                @endforeach
                <dt>Additional Fillers</dt>
                @foreach ($item->AdditionalFillers as $it)
                    <dd>{{$it->name}}</dd>
                @endforeach

                <dt>Price</dt>
                <dd>{{$item->price}} UAH</dd>

                <dt>Text decoration</dt>
                <dd>{!! $item->text_decoration !!}</dd>
                <dt>Comments</dt>
                <dd>{!! $item->comments !!}</dd>
                <dd><img src="{{$item->image}}" alt="" style="width: 10em"></dd>
                <dt>Visible for users</dt>
                <dd>{!! $item->visible == 1 ? "Visible": "Not visible to site" !!}</dd>
              </dl>
            </div>
            <!-- /.card-body -->
          </div>--}}
        @endforeach

    </div>
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

    $('#status_id').select2({
            width: '10em' // need to override the changed default
        });
    </script>

    @stop
@section('css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">
@endsection

