<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>my-laravel</title>

    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" media="screen" title="no title" charset="utf-8">

    <link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <h1>my-laravel</h1>
          <h4>Simple CRUD application using Laravel 5.2</h4>
          <hr />
        </div>
      </div>
      @yield('content')
    </div>
  </body>
  <script src="{{ URL::asset('assets/js/jquery.min.js') }}" charset="utf-8"></script>
  <script src="{{ URL::asset('assets/js/boostrap.min.js') }}" charset="utf-8"></script>
</html>
