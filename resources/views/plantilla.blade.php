
<html>
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <title>@yield('title')</title>
</head>
<body>
  @if(auth()->check())
    <p>Bienvenido {{auth()->user()->login}}</p>
  @endif
  @include('partials.nav')
  @yield('contenido')
</body>
</html>