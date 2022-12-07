<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/css/estilo.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('/css/landing-page.css') }}">
    <link rel="stylesheet" href="{{ asset('/image') }}">

<!-- Iconscout -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">        <!-- Bootstrap Icons-->

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

<!-- Google fonts-->
<link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

<!-- SimpleLightbox plugin CSS-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />

    <title>Soccy</title>
  </head>
  <body>


    @yield('landing-page')

    <!-- Import separate Popper and Bootstrap JS -->
    <script src="{{ asset('/js/popper.min.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.min.js') }}"></script>
    <script src="https://kit.fontawesome.com/7504d1f47e.js" crossorigin="anonymous"></script>

  </body>
</html>
