<div class="row">
    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        {!! Form::label('name', 'categories name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'categories name']) !!}
    </div>
    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        {!! Form::label('slug', 'categories slug:') !!}
        {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Slug for product']) !!}
    </div>
</div>

{{-- <div class="form-group col-6">
    {!! Form::label('price', 'categories price:') !!}
    {!! Form::number('price', null, ['class'=>'form-control ', 'placeholder'=>'Price categories in UAH/kg']) !!}
</div> --}}
{{-- <div class="form-group">
    {!! Form::label('describe', 'categories describe:') !!}
    {!! Form::textarea('describe', null, ['class'=>'form-control', 'id'=>"describe-product", 'rows' => 4, 'cols' => 54, 'placeholder'=>'Describe product']) !!}
</div> --}}
<div class="form-group">
    {!! Form::label('parent_id', 'Parent ategory:') !!}
    {!! Form::select('parent_id', $categoryList,
        null,
        ['class'=>'form-control', 'placeholder'=>'Select category']) !!}
</div>
<div class="form-group">
    {!! Form::label('image_label', 'categories image:') !!}
      <div class="input-group">
        <input type="text" id="image_label" class="form-control" name="image"
               aria-label="Image" aria-describedby="button-image" value="{{$Categories->image??''}}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
        </div>
    </div>
</div>
@if ($Categories->image)
   <div class="form-group">
        <label for="">Image</label>
        <img src="{{$Categories->image}}" alt="" class="thumbnail admin-edit-image" style="width:50em">
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
