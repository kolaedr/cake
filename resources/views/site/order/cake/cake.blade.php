@extends('layouts.main')

@section('content')
{{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
<form action="" method="POST"  name="cake" id="cake" enctype="multipart/form-data" >
    {{-- <form action="/cake" method="POST"  name="cake" id="cake" enctype="multipart/form-data" > --}}
@csrf
<input type="hidden" name="qty" value="1">

    <div class="container row">




            <div class="col-12 row">

            </div>
            <div class="form-item col-12 ai-center">
                {{-- <h4>Выберите размер торта</h4> --}}
                <h4>{{__('cake_size')}}</h4>
                <div class="row col-12 jc-center">
                    @foreach ($CakeSizes as $item)
                    <label for="{{$item->id}}" class=" row cake-size">
                            <input type="radio"
                            name="cake_size_id"
                            id="{{$item->id}}"
                            class="hidden"
                            value="{{$item->id}}"
                            {{$loop->index==0?'checked':''}}
                            data-min-weight="{{$item->weight_min}}"
                            data-max-weight="{{$item->weight_max}}"
                            data-price="{{$item->price}}"
                            >
                            <ul class="">
                                <li><i class="fas fa-ethernet mr-2"></i><strong>{{__('cake_label')}}: {{$item->tier}}</strong></li>
                                <li><i class="fas fa-balance-scale mr-2"></i><strong>{{__('cake_weight')}}: {{$item->weight_min}} - {{$item->weight_max}}</strong></li>
                                <li><i class="fas fa-users mr-2"></i><strong>{{__('cake_piece')}}: {{$item->piece_min}} - {{$item->piece_max}}</strong></li>
                            </ul>
                            {{-- <div class="col-10">
                                <span>Ярусы {{$item->tier}}</span>
                                <span>Вес {{$item->weight_min}} - {{$item->weight_max}}</span>
                                <span>Порции {{$item->piece_min}} - {{$item->piece_max}}</span>
                            </div> --}}
                    </label>
                @endforeach
                </div>

            </div>
            <div class="col-4">
                <div class="col-12">
                    <h6>Amount: <span class="total-sum"></span></h6>
                    {{-- <label for="booking">{{__('booking_date')}}</label> --}}
                    <input type="hidden" name="booking" id="" value="" class="@error('booking') error-alert  @enderror">
                    <input type="date" name="date" id="booking" class="datepicker ">
                    {{-- <input type="date" name="date" id="booking" class="datepicker"> --}}
                    <input type="time" name="time" id="" disabled>
                    {{-- <div id="data-picker"></div> --}}
                    @error('booking')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col-12">
                    <div class="form-item">
                        <label for="text_decoration">{{__('Your text for design cake')}}</label>
                        <input type="text" name="text_decoration" id="text_decoration" placeholder="{{__('Your text for design cake')}}">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-item">
                        <label for="comment">{{__('Your comment')}}</label>
                        <input type="text" name="comment" id="comment" placeholder="{{__('Your comment for cake')}}">
                    </div>
                </div>
                <div class="col-12">
                    <h6>{{__('cake_user_images')}}</h6>
                        <div class="">


                    </div>
                    <div class="file">
                        <label for="file" class=""><span class="file-name"> {{__('Choose file...')}}</span></label>
                        <input type="file" name="image[]" id="file" class="file-input"   multiple>

                    </div>

                </div>
                {{-- <div class="col-12">
                    <div class="form-item">
                        <label for="name">{{__('user_name')}}</label>
                        <input type="text" name="name" id="name" class="@error('name') error-alert  @enderror" placeholder="Put user name" value="{{Auth::user()->name??''}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-item">
                        <label for="phone">{{__('user_phone')}}</label>
                        <input type="text" name="phone" id="phone" class="user-phone  @error('phone') error-alert  @enderror" placeholder="{{__('Your phone')}}"  value="{{Auth::user()->phone??''}}" required>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                </div> --}}
                {{-- <div class="col-12 row">
                    <div class=" col-12" >
                        <p>{{__('delivery')}}</p>

                        <input type="radio" name="delivery" id="delivery" placeholder="Sobornyi" checked value="pickup">
                        <label for="delivery">{{__('delivery_from_cafe')}}</label><br>
                        <input type="radio" name="delivery" id="delivery_to_address" placeholder="Sobornyi"  value="delivery" data-price="150">
                        <label for="delivery_to_address">{{__('delivery_to_address')}}</label>
                    </div>
                    <div class="col-12  delivery-info mt-2">
                        <p class="">{{__('delivery_info_text')}}</p>
                        <div class="form-item col-12">
                            <label for="street">{{__('delivery_street')}}</label>
                            <input type="text" name="street" id="street" placeholder="Sobornyi" value="{{Auth::user()->street??''}}">
                        </div>
                        <div class="form-item col-6">
                            <label for="build">{{__('delivery_build')}}</label>
                            <input type="text" name="build" id="build" placeholder="11" style="width: 4em" value="{{Auth::user()->build??''}}">
                        </div>
                        <div class="form-item col-6">
                            <label for="room">{{__('delivery_room')}}</label>
                            <input type="text" name="room" id="room" placeholder="123" style="width: 4em" value="{{Auth::user()->room??''}}">
                        </div>
                    </div>
                    <div class="col-12 cafe-info mt-2 show">
                    <p>{{__('cafe_address')}}</p>
                    </div>


                </div> --}}
                <button type="submit" class="btn btn-primary add-cake-to-cart">{{__('button_add_cake_to_cart')}}</button>
            </div>
            {{-- <div class="col-4"></div> --}}
            <div class="col-8">
                <div class=" col-12">
                    <h5>{{__('cake_filling')}}</h5>
                        <div class="row">
                            @foreach ($CakeFillings as $item)
                            <label for="CakeFilling_{{$item->id}}" class="cake-filling 6 row">
                                    <input type="radio"
                                    name="cake_filling_tier_1_id"
                                    id="CakeFilling_{{$item->id}}"
                                    class="col-1 hidden"
                                    value="{{$item->id}}"
                                    {{$loop->index==0?'checked':''}}
                                    data-price="{{$item->price}}"
                                    >
                                    <div class="row ai-center col-2">
                                        <img src="{{$item->image}}" alt="" class="" style="width: 100%"></div>
                                    <div class="col-10">
                                        <h5>{{$item->name}}</h5>
                                        @if ($item->price !== 0.00)
                                        <small><strong>{{__('cake_filling_price')}}: {{$item->price}} {{__('uah')}}</strong></small><br>
                                        @endif
                                        <span>{!! $item->describe !!}</span>

                                    </div>
                            </label>
                            @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <h5>{{__('cake_top_decoration')}}</h5>
                    <div class="row">
                        @foreach ($CakeTopDecorations as $item)
                        <label for="CakeTopDecorations_{{$item->id}}" class="cake-top  row">
                                <input type="radio"
                                name="cake_top_decoration_id"
                                id="CakeTopDecorations_{{$item->id}}"
                                class="col-1 hidden"
                                value="{{$item->id}}"
                                {{$loop->index==0?'checked':''}}
                                data-price="{{$item->price}}"
                                >
                                <div class="col-2"><img src="{{$item->image}}" alt="" class="" style="width: 100%"></div>
                                <div class="col-10">
                                    <h5>{{$item->name}}</h5>
                                    @if ($item->price !== 0.00)
                                    <small>{{__('cake_top_decoration_price')}}: {{$item->price}} {{__('uah')}}</small><br>
                                    @endif
                                    <span>{!! $item->describe !!}</span>
                                </div>
                        </label>
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <h5>{{__('cake_side_decoration')}}</h5>
                        <div class="row">
                            @foreach ($CakeSideDecorations as $item)
                            <label for="CakeSideDecorations_{{$item->id}}" class="cake-side  row">
                                    <input type="radio"
                                    name="cake_side_decoration_id"
                                    id="CakeSideDecorations_{{$item->id}}"
                                    class="col-1 hidden"
                                    value="{{$item->id}}"
                                    {{$loop->index==0?'checked':''}}
                                    data-price="{{$item->price}}"
                                    >
                                    <div class="col-2"><img src="{{$item->image}}" alt="" style="width: 100%"></div>
                                    <div class="col-10">
                                        <h5>{{$item->name}}</h5>
                                        @if ($item->price !== '0.00')
                                        <small>{{__('cake_side_decoration_price')}}: {{$item->price}} {{__('uah')}}</small><br>
                                        @endif
                                        <span>{!! $item->describe !!}</span>
                                    </div>
                            </label>
                            @endforeach
                    </div>
                </div>

            </div>

            </form>


        {{-- {!! Form::model($cake, ['url'=>'cake','class'=>'']) !!}
        @include('site.order.cake._form')

        <div class="row ai-center">
            {!! Form::submit('Add product', ['class'=>'btn btn-primary']) !!}
            <a href="/cake" class="ml-3">back</a>
        </div>
        {!! Form::close() !!} --}}


    </div>



@endsection




@section('js')
{{-- <script src="http://store/js/app.js" defer=""></script> --}}
{{-- <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script> --}}
<script>

    if (document.querySelector('input[name="delivery"]')) {
        let delivery = document.querySelectorAll('input[name="delivery"]');
        for (const iterator of delivery) {
            iterator.addEventListener('change', (e)=>{
                document.querySelector('.delivery-info').classList.toggle('show');
                document.querySelector('.cafe-info').classList.toggle('show');
            });
        }
    };



    //date
    {
        let date;
        document.querySelector('input[name="date"]').addEventListener('input', (e)=>{
            // booki = new Date(e.target.value).getHours();
            date = e.target.value;
            // date = e.target.value.split('-');
            document.querySelector('input[name="time"]').removeAttribute('disabled');
        })
        document.querySelector('input[name="time"]').addEventListener('input', (e)=>{
            let time = e.target.value;
            // let time = e.target.value.split(':');
            // const utcDate = new Date(Date.UTC(date[0], date[1]-1, date[2], time[0], time[1])/1000);
            document.querySelector('input[name="booking"]').value = date+' '+time+':00';
            // document.querySelector('input[name="booking"]').value = utcDate.valueOf();

        })
    }


    // let sum, cake, cake_top, side, size;
    let price = document.querySelectorAll("input[data-price]");

    //work
    // document.forms.cake.addEventListener('input', (e)=>{
    //     let pricing = [];
    //     for (let object of price) {
    //         if (object.checked) {
    //             if (object.hasAttribute('data-max-weight')) {
    //                 pricing.push(Number(object.getAttribute('data-max-weight')))
    //             }
    //             pricing.push(Number(object.getAttribute('data-price')))
    //         };
    //     };
    //     sum(pricing);
    //     console.log('object :', pricing);
    // });

    // let sum = (price=[]) =>{
    //     let totalSum = document.querySelector('.total-sum');
    //     var result = price.reduce(function(sum, current, i) {
    //         if (i<3) {
    //             return sum * current;
    //         };
    //         return sum + current
    //         }, 1);
    //     totalSum.innerHTML = result.toFixed(2);
    // }

    document.forms.cake.addEventListener('input', (e)=>{
        let pricing = {};
        for (let object of price) {
            if (object.checked) {
                if (object.getAttribute('name')==='cake_size_id') {
                    object.hasAttribute('data-min-weight')
                        ?pricing['size-min-weight']=+object.getAttribute('data-min-weight'):'';
                    object.hasAttribute('data-max-weight')
                        ?pricing['size-max-weight']=+object.getAttribute('data-max-weight'):'';
                    object.hasAttribute('data-price')
                        ?pricing['size-price']=+object.getAttribute('data-price'):'';
                }
                object.getAttribute('name')==='cake_filling_tier_1_id'?pricing['filling-price']=+object.getAttribute('data-price'):'';
                object.getAttribute('name')==='cake_top_decoration_id'?pricing['top-price']=+object.getAttribute('data-price'):'';
                object.getAttribute('name')==='cake_side_decoration_id'?pricing['side-price']=+object.getAttribute('data-price'):'';
                // object.getAttribute('name')==='delivery'?pricing['delivery-price']=+object.getAttribute('data-price'):'';
            };
        };
        sum(pricing);
        // console.log('object :', pricing);
    });

    let sum = (pricing) =>{
        let totalSum = document.querySelector('.total-sum');
        let resultMIN = (pricing['size-price']*pricing['size-min-weight']*pricing['filling-price'])+pricing['side-price']+pricing['top-price'];
        let resultMAX = (pricing['size-price']*pricing['size-max-weight']*pricing['filling-price'])+pricing['side-price']+pricing['top-price'];
        totalSum.innerHTML = resultMIN.toFixed(2)+' - '+resultMAX.toFixed(2);
    }




    const listTop = document.querySelectorAll("input[name=cake_top_decoration_id]");
        for (let object of listTop) {
                object.addEventListener('click', (e)=>{
                    for (let object of listTop) {
                        if (!object.checked) {

                            object.parentNode.style.opacity = 0.5;
                            // object.parentNode.style.transform = 'scale(0.95)';
                        }
                    }
                e.target.parentNode.style.opacity = 1;
                // e.target.parentNode.style.transform = 'scale(1.05)';
                e.stopPropagation();
            });
        };




    const listSide = document.querySelectorAll("input[name=cake_side_decoration_id]");
    for (let object of listSide) {
            object.addEventListener('click', (e)=>{
                for (let object of listSide) {
                    if (!object.checked) {
                        object.parentNode.style.opacity = 0.5;
                        // object.parentNode.style.transform = 'scale(0.9)';
                    }
                }
            e.target.parentNode.style.opacity = 1;
            // e.target.parentNode.style.transform = 'scale(1.1)';
            e.stopPropagation();
        });
    };

    const listFill = document.querySelectorAll("input[name=cake_filling_tier_1_id]");
    for (let object of listFill) {
            object.addEventListener('click', (e)=>{
                for (let object of listFill) {
                    if (!object.checked) {
                        object.parentNode.style.opacity = 0.5;
                        // object.parentNode.style.transform = 'scale(0.9)';
                        // object.parentNode.style.order = 2;
                        // object.parentNode.classList.add('hidden-img');
                    }
                }
            e.target.parentNode.style.opacity = 1;
            // e.target.parentNode.style.transform = 'scale(1.1)';
            // e.target.parentNode.style.order = '1';
            // e.target.parentNode.classList.remove('hidden-img');
            e.stopPropagation();
        });
    };

    const listSize = document.querySelectorAll("input[name=cake_size_id]");
    for (let object of listSize) {
            object.addEventListener('click', (e)=>{
                for (let object of listSize) {
                    if (!object.checked) {
                        object.parentNode.style.opacity = 0.5;
                        // object.parentNode.style.border = 'none';
                    }
                }
            e.target.parentNode.style.opacity = 1;
            // e.target.parentNode.style.border = '1px solid gray';
            e.stopPropagation();
        });
    };


</script>
@endsection

@section('css')
{{-- <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}"> --}}
@endsection

{{-- @foreach ($CakeFillings as $item)
                        <label for="CakeFillings{{$item->id}}" class="col-4">

                                <input type="radio" name="cake_filling_tier_1_id" id="CakeFillings{{$item->id}}"  class="hidden"  value="{{$item->id}}" {{$loop->index==0?'checked':''}}>
                                <div class="col-12">
                                    <div class="border">
                                        <h5 class="">{{$item->name}}</h5>
                                        <span>Цена за 1 кг: <strong>{{$item->price}}</strong> UAH</span>
                                    </div>
                                    <img src="{{$item->image}}" alt="" style="width: 100%"></div>
                                <div class="col-12 mt-2">
                                    <h5>Краткое описание</h5>
                                    <p>{{$item->describe}}</p>

                                </div>
                        </label>
                        @endforeach --}}
