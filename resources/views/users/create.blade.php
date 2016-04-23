@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <h3>Create a User</h3>

    @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    {!! Form::open(array('url' => 'users')) !!}
      <div class="form-group">
        {!! Form::label('name', 'Full Name') !!}
        {!! Form::text('name', '', array('class' => 'form-control', 'placeholder' => 'e.g. Valdi Adrian Abrar')) !!}
      </div>
      <div class="form-group">
        {!! Form::label('address', 'Address') !!}
        {!! Form::text('address', '', array('class' => 'form-control', 'placeholder' => 'e.g. Jalan merpati 2 Blok A1/2 Jogja')) !!}
      </div>
      <div class="form-group">
        {!! Form::label('phone', 'Phone Number') !!}
        {!! Form::text('phone', '', array('class' => 'form-control', 'placeholder' => 'e.g. 08111438747')) !!}
      </div>

      {!! Form::submit('Create User!', array('class' => 'btn btn-primary')) !!}
      <a href="{!! URL::to('users') !!}" class="btn btn-link">Cancel</a>
    {!! Form::close() !!}
  </div>
</div>
@endsection
