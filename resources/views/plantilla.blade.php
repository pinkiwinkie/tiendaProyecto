
<html>
<head>
  <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <title>@yield('title')</title>
</head>
<body>
  @include('partials.nav')
  @yield('contenido')
</body>
</html>