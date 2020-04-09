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
<form action="" method="POST"  name="cake" id="cake" enctype="multipart/form-data" >
@csrf
<input type="hidden" name="qty" value="1">

    <div class="container row">

            <div class="col-12 row">
                <div class="col-6">
                    <h6>Amount: <span class="total-sum"></span></h6>
                        <div class="form-item">
                            <label for="text_decoration">{{__('Your text for design cake')}}</label>
                            <input type="text" name="text_decoration" id="text_decoration" placeholder="{{__('Your text for design cake')}}">
                        </div>
                        <div class="form-item">
                            <label for="comment">{{__('Your comment')}}</label>
                            <input type="text" name="comment" id="comment" placeholder="{{__('Your comment for cake')}}">
                        </div>
                        <h6>{{__('cake_user_images')}}</h6>
                            <div class="">
                        </div>
                        <div class="file">
                            <label for="file" class=""><span class="file-name"> {{__('Choose file...')}}</span></label>
                            <input type="file" name="image[]" id="file" class="file-input"   multiple>
                        </div>
                    <button type="submit" class="btn btn-primary add-cake-to-cart">{{__('button_add_cake_to_cart')}}</button>
                </div>
                <div class="col-6 jc-center">
                    <div id="data-picker"></div>
                    {{-- @if (!session('booking'))
                        <div id="data-picker"></div>
                        @error('booking')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @else
                        <input type="text" name="booking" id="booking" class=" "
                        value="{{session('booking')}}"
                        @if (session('booking'))
                            readonly
                        @endif
                        >
                    @endif --}}
                </div>

            </div>

            <div class="form-item col-12 ai-center">

                <h4>{{__('cake_size')}}</h4>
                <div class="row jc-center cake-sizing">
                    @foreach ($CakeSizes as $item)
                    <label for="{{$item->id}}" class=" cake-size">
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
                    </label>
                @endforeach
                </div>
            </div>

            <div class="col-12 ai-center form-item ">
                <h4>{{__('cake_filling')}}</h4>
                <div class="col-12 row card-list">
                    @foreach ($CakeFillings as $item)
                        <div class="card ">
                            <input type="radio"
                                name="cake_filling_tier_1_id"
                                id="CakeFilling_{{$item->id}}"
                                class="col-1 hidden"
                                value="{{$item->id}}"
                                {{$loop->index==0?'checked':''}}
                                data-price="{{$item->price}}"
                                >
                            <div class="card-img">
                                <img src="{{$item->image}}" alt="" class="">
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <span>{{$item->name}}</span>
                                </div>
                                <div class="card-content">
                                    <p>{!! $item->describe !!}</p>
                                </div>
                                <div class="card-footer">
                                    <div class="card-price">
                                        @if ($item->price !== 0.00)
                                        <strong>{{$item->price}} {{__('uah')}}</strong>
                                        @endif
                                    </div>
                                    <div class="card-select">
                                        <label for="CakeFilling_{{$item->id}}" class="">{{__("select_item")}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach
                </div>
                <div class="col-12  ai-center form-item">
                    <h5>{{__('cake_top_decoration')}}</h5>
                    <div class="col-12 row card-list">
                        @foreach ($CakeTopDecorations as $item)
                        <div class="card card-5  ">
                            <input type="radio"
                                name="cake_top_decoration_id"
                                id="CakeTopDecorations_{{$item->id}}"
                                class="col-1 hidden"
                                value="{{$item->id}}"
                                {{$loop->index==0?'checked':''}}
                                data-price="{{$item->price}}"
                                >
                            <div class="card-img">
                                <img src="{{$item->image}}" alt="" class="">
                            </div>
                            <div class="card-body">
                                <div class="card-title">
                                    <span>{{$item->name}}</span>
                                </div>
                                <div class="card-content">
                                    <p>{!! $item->describe !!}</p>
                                </div>
                                <div class="card-footer">
                                    <div class="card-price">
                                        @if ($item->price !== 0.00)
                                        <strong>{{$item->price}} {{__('uah')}}</strong>
                                        @endif
                                    </div>
                                    <div class="card-select">
                                        <label for="CakeTopDecorations_{{$item->id}}" class="">{{__("select_item")}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>

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
    </div>



@endsection




@section('js')
{{-- <script src="http://store/js/app.js" defer=""></script> --}}
{{-- <script src="{{ asset('vendor/file-manager/js/file-manager.js') }}"></script> --}}
<script>





    //date



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
                        console.log('object :', object.parentNode.children[1]);
                        object.parentNode.children[1].style.opacity = 0.7;
                        // object.parentNode.style.transform = 'scale(0.9)';
                        // object.parentNode.style.order = 2;
                        // object.parentNode.classList.add('hidden-img');
                    }
                }
            e.target.parentNode.children[1].style.opacity = 1;
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
