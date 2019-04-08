<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Included CSS Files, use foundation.css if you do not want minified code -->
    <link rel="stylesheet" href="/css/foundation.css"/>
    <link rel="stylesheet" href="/css/foundation.css">
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>

    <div class="container">
      <header class="row fullWidth">
        @include('includes.header')
      </header>

      <section class="row fullWidth">
        @yield('content')
      </section>

      <footer>
        @include('includes.footer')
    </div>


    <!-- Latest version of jQuery -->
    <script src="/js/vendor/jquery.js"></script>
    <!-- Included JS Files (Minified) -->
    <script src="/js/vendor/foundation.min.js"></script>
    <!-- Initialize JS Plugins -->
    <script src="/js/app.js"></script>
  </body>
</html>
