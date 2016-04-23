@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <h1>Showing {!! $user->name !!}</h1>
    <hr>

    <p>
      <strong>Full Name: </strong>{!! $user->name !!}
    </p>
    <address>
      {!! $user->address !!} <br />
      <abbr title="Phone">Phone:</abbr> {!! $user->phone !!}
    </address>
  </div>
</div>
@endsection
