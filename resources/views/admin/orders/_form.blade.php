<div class="row">
    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        {!! Form::label('user_id', 'User name:') !!}
        {!! Form::text('user_id', $Orders->users->name, ['class'=>'form-control', 'placeholder'=>'User name', 'readonly']) !!}
    </div>
    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        {!! Form::label('user_phone', 'User phone:') !!}
        {!! Form::text('user_phone', $Orders->users->phone, ['class'=>'form-control', 'placeholder'=>'User name', 'readonly']) !!}
    </div>
    <div class="form-group col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        {!! Form::label('booking', 'Order booking:') !!}
        {!! Form::text('booking', date('j F, Y H:m', $Orders->booking), ['class'=>'form-control', 'placeholder'=>'Slug for product']) !!}
    </div>
</div>

<div class="form-group ">
    {!! Form::label('status_id', 'Cake Filling price:') !!}
    {!! Form::select('status_id', $statuses, $Orders->status_id, ['class'=>'form-control col-6']) !!}
</div>
{{-- <div class="form-group">
    {!! Form::label('describe', 'Cake Filling describe:') !!}
    {!! Form::textarea('describe', null, ['class'=>'form-control', 'id'=>"describe-product", 'rows' => 4, 'cols' => 54, 'placeholder'=>'Describe product']) !!}
</div> --}}
{{-- <div class="form-group">
    {!! Form::label('image_label', 'Cake Filling image:') !!}
      <div class="input-group">
        <input type="text" id="image_label" class="form-control" name="image"
               aria-label="Image" aria-describedby="button-image" value="{{$Orders->image??''}}">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button" id="button-image">Select</button>
        </div>
    </div>
</div> --}}

{{-- <div class="form-group">
    <div class="form-check form-check-inline">
        {!! Form::label('visible', 'Visible product:', ['class'=>'form-check-label m-3r' ]) !!}
        {!! Form::checkbox('visible', null, ['class'=>'form-check-input']) !!}
    </div>
</div> --}}
