<div class="row">
    <div class="col-4">
        {!! Form::label('booking', 'Product price:') !!}
    {!! Form::date('booking', \Carbon\Carbon::now()); !!}
        {{-- <div id="data-picker"></div> --}}
    </div>
    <div class="col-8 row">
        <div class="form-group col-6">
            {!! Form::label('street', 'Street:') !!}
            {!! Form::text('street', $user->deliveries[0]->street??null, ['class'=>'form-control', 'placeholder'=>'Product name']) !!}
        </div>
        <div class="form-group  col-6">
            {!! Form::label('build', 'build:') !!}
            {!! Form::number('build', $user->deliveries[0]->build??null, ['class'=>'form-control', 'placeholder'=>'build']) !!}
        </div>
        <div class="form-group  col-6">
            {!! Form::label('build_index', 'build_index:') !!}
            {!! Form::text('build_index', $user->deliveries[0]->build_index??null, ['class'=>'form-control', 'placeholder'=>'build_index']) !!}
        </div>
        <div class="form-group   col-6">
            {!! Form::label('room', 'room:') !!}
            {!! Form::number('room', $user->deliveries[0]->room??null, ['class'=>'form-control', 'placeholder'=>'Sroom']) !!}
        </div>
        <div class="form-group   col-6">
            {!! Form::label('name', 'name:') !!}
            {!! Form::text('name', $user->name??null, ['class'=>'form-control', 'placeholder'=>'name']) !!}
        </div>
        <div class="form-group   col-6">
            {!! Form::label('phone', 'phone:') !!}
            {!! Form::text('phone', $user->phone??null, ['class'=>'form-control', 'placeholder'=>'phone']) !!}
        </div>
    </div>

</div>

<div class="form-group row">
    {{-- {!! Form::label('booking', 'Product price:') !!}
    {!! Form::date('booking', \Carbon\Carbon::now()); !!} --}}

    {{-- <div id="data-moments"></div> --}}
</div>

<h4>CakeFillings</h4>
<div class="form-group row">
    @foreach ($CakeFillings as $item)

            {{-- {{dump($item)}} --}}
            {{-- {!! Form::label('cake_filling_tier_1_id', $item) !!}
            {!! Form::radio('cake_filling_tier_1_id', $key, false, ['class'=>' ml-2 form-check-input']) !!} --}}
            <label for="{{$item->id}}" class="col-6 row">

                    <input type="radio" name="cake_filling_tier_1_id" id="{{$item->id}}"  class="col-1"  value="{{$item->id}}">
                    <div class="col-5"><img src="{{$item->image}}" alt="" style="width: 100%"></div>
                    <div class="col-6">
                        <h5>{{$item->name}}</h5>
                        <span>{{$item->describe}}</span>
                        <small>{{$item->price}} UAH</small>
                    </div>
            </label>

    @endforeach
</div>
{{-- <div class="form-group">
    {!! Form::label('cake_filling_tier_1_id', 'Cake filling:') !!}
    {!! Form::select('cake_filling_tier_1_id', $CakeFillings,
        null,
        ['class'=>'form-control']) !!}
</div> --}}
<div class="form-group">
    {!! Form::label('cake_filling_tier_2_id', 'Cake filling:') !!}
    {!! Form::select('cake_filling_tier_2_id', $CakeFillings,
        null,
        ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('cake_filling_tier_3_id', 'Cake filling:') !!}
    {!! Form::select('cake_filling_tier_3_id', $CakeFillings,
        null,
        ['class'=>'form-control']) !!}
</div>

<h4>CakeTopDecorations</h4>
<div class="form-group row">
    @foreach ($CakeTopDecorations as $item)
            <label for="{{$item->id}}" class="col-6 row">
                    <input type="radio" name="cake_top_decoration_id" id="{{$item->id}}"  class="col-1"  value="{{$item->id}}">
                    <div class="col-5"><img src="{{$item->image}}" alt="" style="width: 100%"></div>
                    <div class="col-6">
                        <h5>{{$item->name}}</h5>
                        <span>{{$item->describe}}</span>
                        <small>{{$item->price}} UAH</small>
                    </div>
            </label>
    @endforeach
</div>

{{-- <div class="form-group">
    {!! Form::label('cake_top_decoration_id', 'Cake top:') !!}
    {!! Form::select('cake_top_decoration_id', $CakeTopDecorations,
        null,
        ['class'=>'form-control']) !!}
</div> --}}

<h4>CakeSideDecorations</h4>
<div class="form-group row">
    @foreach ($CakeSideDecorations as $item)
            <label for="{{$item->id}}" class="col-6 row">
                    <input type="radio" name="cake_side_decoration_id" id="{{$item->id}}"  class="col-1" value="{{$item->id}}">
                    <div class="col-5"><img src="{{$item->image}}" alt="" style="width: 100%"></div>
                    <div class="col-6">
                        <h5>{{$item->name}}</h5>
                        <span>{{$item->describe}}</span>
                        <small>{{$item->price}} UAH</small>
                    </div>
            </label>
    @endforeach
</div>

{{-- <div class="form-group">
    {!! Form::label('cake_side_decoration_id', 'Cake side:') !!}
    {!! Form::select('cake_side_decoration_id', $CakeSideDecorations,
        null,
        ['class'=>'form-control']) !!}
</div> --}}

<h4>CakeTopDecorations</h4>
<div class="form-group row">
    @foreach ($CakeSizes as $item)
            <label for="{{$item->id}}" class="col-6 row">
                    <input type="radio" name="cake_size_id" id="{{$item->id}}"  class="col-2"  value="{{$item->id}}">
                    <div class="col-10">
                        <h5>Ярусы {{$item->tier}}</h5>
                        <h6>Вес {{$item->weight_min}} - {{$item->weight_max}}</h6>
                        <h6>Порции {{$item->piece_min}} - {{$item->piece_max}}</h6>
                        {{-- <span>{{$item->describe}}</span> --}}
                        {{-- <small>{{$item->price}} UAH</small> --}}
                    </div>
            </label>
    @endforeach
</div>
{{-- <div class="form-group">
    {!! Form::label('cake_size_id', 'Cake size:') !!}
    {!! Form::select('cake_size_id', $CakeSizes,
        null,
        ['class'=>'form-control']) !!}
</div> --}}


<div class="row">

    <div class="col-6">
        <h4>AdditionalFillers</h4>
        <div class="form-group row">
            @foreach ($AdditionalFillers as $item)
                    <label for="{{$item->id}}" class="col-6 row">
                            <input type="checkbox" name="additional_filler_id[]" id="{{$item->id}}"  class="col-1" value="{{$item->id}}">
                            <div class="col-5"><img src="{{$item->image}}" alt="" style="width: 100%"></div>
                            <div class="col-6">
                                <h5>{{$item->name}}</h5>
                                <span>{{$item->describe}}</span>
                                <small>{{$item->price}} UAH</small>
                            </div>
                    </label>
            @endforeach
        </div>

        {{-- <h4>AdditionalFillers</h4>
        @foreach ($AdditionalFillers as $key=>$item)
            <div class="form-group">
                {!! Form::label('additional_filler_id', $item) !!}
                {!! Form::checkbox('additional_filler_id', $key, false, ['class'=>' ml-2 form-check-input', 'name'=>'additional_filler_id[]']) !!}
            </div>
        @endforeach --}}
    </div>
    <div class="col-6">
        <h4>AdditionalDecorations</h4>
        <div class="form-group row">
            @foreach ($AdditionalDecorations as $item)
                    <label for="{{$item->id}}" class="col-6 row">
                            <input type="checkbox" name="additional_decorations_id[]" id="{{$item->id}}"  class="col-1" value="{{$item->id}}">
                            <div class="col-5"><img src="{{$item->image}}" alt="" style="width: 100%"></div>
                            <div class="col-6">
                                <h5>{{$item->name}}</h5>
                                <span>{{$item->describe}}</span>
                                <small>{{$item->price}} UAH</small>
                            </div>
                    </label>
            @endforeach
        </div>

        {{-- <h4>AdditionalDecorations</h4>
        @foreach ($AdditionalDecorations as $key=>$item)
            <div class="form-group">
                {!! Form::label('additional_decorations_id', $item) !!}
                {!! Form::checkbox('additional_decorations_id', $key, false, ['class'=>' ml-2 form-check-input', 'name'=>'additional_decorations_id[]']) !!}
            </div>
        @endforeach --}}
    </div>
</div>



<div class="form-group">
    {!! Form::label('image', 'Product image:') !!}
    <label for="thumbnail">Image</label>
    <div class="input-group">
        <span class="input-group-btn">
          <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary text-light">
            <i class="fa fa-picture-o"></i> Choose image
          </a>
        </span>
        <input id="thumbnail" class="form-control" type="text" name="image"  value="{{$product->image != '[]' ? $product->image : ''}}">
      </div>
      <img id="holder" style="margin-top:15px;max-height:100px;">
</div>

@if ($cake->image)
   <div class="form-group">
        <label for="">Image</label>

        {{-- <img src="{{$product->image}}" alt="" class="thumbnail admin-edit-image">
        <a href="#" class="remove-img"> Remove</a>
        <input type="hidden" name="removeImg"> --}}
        @error('img')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
@endif
<div class="form-group">
    {!! Form::label('text_decoration', 'text_decoration:') !!}
    {!! Form::textarea('text_decoration', null, ['class'=>'form-control', 'id'=>"describe-product", 'rows' => 4, 'cols' => 54, 'placeholder'=>'Describe product']) !!}
</div>

<div class="form-group">
    {!! Form::label('comments', 'comment:') !!}
    {!! Form::textarea('comments', null, ['class'=>'form-control', 'id'=>"comments", 'rows' => 2, 'cols' => 54, 'placeholder'=>'Describe product']) !!}
</div>

{{-- <div class="form-group">
    {!! Form::label('sku', 'Put artikul:') !!}
    {!! Form::text('sku', null, ['class'=>'form-control', 'placeholder'=>'SKU product (#1232234)']) !!}
</div>
<div class="form-group">
    {!! Form::label('favorite', 'Favorite product:') !!}
    {!! Form::checkbox('favorite', null, ['class'=>'form-control ml-2', 'placeholder'=>'SKU product (#1232234)', ]) !!}
</div> --}}


