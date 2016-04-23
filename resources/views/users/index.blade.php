@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <a href="{!! URL::route('users.create') !!}" class="btn btn-warning">Create User</a>
    <br />
    <br />

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
      <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    <table class="table table-stripped">
      <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone Number</th>
        <th>Action</th>
      </tr>
    @foreach ($users as $data)
      <tr>
        <td>{!! $data->id !!}</td>
        <td>{!! $data->name !!}</td>
        <td>{!! $data->address !!}</td>
        <td>{!! $data->phone !!}</td>
        <td>
          <!-- show -->
          <a href="{!! URL::to('users/' . $data->id) !!}" class="btn btn-success">Show</a>
          <!-- edit -->
          <a href="{!! URL::to('users/' . $data->id) . '/edit' !!}" class="btn btn-primary">Edit</a>
          <!-- delete -->
          {{ Form::open(array('url' => 'users/' . $data->id, 'class' => 'pull-right')) }}
              {{ Form::hidden('_method', 'DELETE') }}
              {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
          {{ Form::close() }}
        </td>
      </tr>
    @endforeach
    </table>
    {!! $users->links() !!}
  </div>
</div>
@endsection
