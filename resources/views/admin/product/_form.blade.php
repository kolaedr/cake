<div class="row">
    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        {!! Form::label('name', 'Product name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Product name']) !!}
    </div>
    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        {!! Form::label('slug', 'Product slug:') !!}
        {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Slug for product']) !!}
    </div>
</div>

<div class="form-group col-6">
    {!! Form::label('price', 'Product price:') !!}
    {!! Form::number('price', null, ['class'=>'form-control ', 'placeholder'=>'Price product in USD']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Parent category:') !!}
    {!! Form::select('category_id', $categoryList,
        $Products->categories,
        ['class'=>'form-control col-10', 'multiple'=>'multiple', 'name'=>'category_id[]']) !!}
</div>
<div class="form-group">
    {!! Form::label('image_label', 'Products image:') !!}
      <div class="input-group">
        <input type="text" id="image_label" class="form-control" name="image"
               aria-label="Image" aria-describedby="button-image" value="{{$Products->image??''}}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
        </div>
    </div>
</div>
@if ($Products->image)
   <div class="form-group">
        <label for="">Image</label>
        <img src="{{$Products->image}}" alt="" class="thumbnail admin-edit-image" style="width:50em">
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
