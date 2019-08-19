<html>
  <head>
    <title>@yield('titie')</title>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <style>
      .head{
        background-color: rgb(30, 52, 125);
        /* padding-top: 1; */
        font-size:22px;
        height:50px;
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="fluid-container head" align="center">
      <a href="{{url('mrt')}}" > MRT History </a>
    </div>
    <div class="row">
      <div class="col-md-2" style="background-color: rgb(30, 52, 125)">
        <a href="/mrt">MRT History</a>
      </div>
      <div class="col-md-10">
        @yield('content')
      </div>
    </div>
  </body>
</html>
