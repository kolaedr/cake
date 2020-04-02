<div class="row">
    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        {!! Form::label('name', 'Cake Filling name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Cake Filling name']) !!}
    </div>
    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        {!! Form::label('slug', 'Cake Filling slug:') !!}
        {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Slug for product']) !!}
    </div>
</div>

<div class="form-group col-6">
    {!! Form::label('price', 'Cake Filling price:') !!}
    {!! Form::number('price', null, ['class'=>'form-control ', 'placeholder'=>'Price filling in UAH/kg']) !!}
</div>
<div class="form-group">
    {!! Form::label('describe', 'Cake Filling describe:') !!}
    {!! Form::textarea('describe', null, ['class'=>'form-control', 'id'=>"describe-product", 'rows' => 4, 'cols' => 54, 'placeholder'=>'Describe product']) !!}
</div>
<div class="form-group">
    {!! Form::label('image_label', 'Cake Filling image:') !!}
      <div class="input-group">
        <input type="text" id="image_label" class="form-control" name="image"
               aria-label="Image" aria-describedby="button-image" value="{{$AdditionalFillers->image??''}}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
        </div>
    </div>
</div>
@if ($AdditionalFillers->image)
   <div class="form-group">
        <label for="">Image</label>
        <img src="{{$AdditionalFillers->image}}" alt="" class="thumbnail admin-edit-image" style="width:50em">
        <a href="#" class="remove-img"> Remove</a>
        <input type="hidden" name="removeImg">
        @error('image')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
@endif

<div class="form-group">
    <div class="form-check form-check-inline">
        {!! Form::label('visible', 'Visible product:', ['class'=>'form-check-label m-3r' ]) !!}
        {!! Form::checkbox('visible', null, ['class'=>'form-check-input']) !!}
    </div>
</div>
