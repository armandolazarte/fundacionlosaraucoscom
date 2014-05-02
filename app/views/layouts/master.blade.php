<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <link rel="author" href="humans.txt" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>
      @section('title')
        Fundación Los Araucos
      @show
  </title>

  <link rel="icon" href="{{ url('favicon.ico') }}" type="image/x-icon" />
  <link href='http://fonts.googleapis.com/css?family=Oswald|Merriweather+Sans|Open+Sans|Open+Sans+Condensed:300,700' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{ url('css/bootstrap-spacelab.min.css') }}" />
  <link rel="stylesheet" href="{{ url('css/fundacionlosaraucos.css') }}" />
  <link rel="stylesheet" href="{{ url('css/animate.css') }}" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>

  @include('bloques.navtop')

  @yield('contenido')

  @include('bloques.footer')

  @section('javascript')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="{{ url('js/fundacionlosaraucos.js') }}"></script>
    <script src="{{ url('js/picturefill.js') }}"></script>
  @show

</body>