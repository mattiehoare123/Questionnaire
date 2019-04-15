<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!--Character encoding capable of encoding all characters on the web-->
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <!--Allows it to be viewed on a mobile device-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Included CSS Files in the public folder that contain all the css code-->
    <link rel="stylesheet" href="/css/foundation.css"/>
    <link rel="stylesheet" href="/css/foundation.css">
    <link rel="stylesheet" href="/css/app.css">
  </head>
  <body>
    <!--Defining a container and row which is used in the Foundation layout-->
    <div class="container">
      <header class="row fullWidth">
        @include('includes.header')<!--Inclue the nav bar-->
      </header>

      <section class="row fullWidth">
        @yield('content')<!--Defining a section within the layout-->
      </section>

      <footer>
        @include('includes.footer')<!--Include the footer-->
    </div>


    <!-- Latest version of jQuery -->
    <script src="/js/vendor/jquery.js"></script>
    <!-- Included JS Files (Minified) -->
    <script src="/js/vendor/foundation.min.js"></script>
    <!-- Initialize JS Plugins -->
    <script src="/js/app.js"></script>
  </body>
</html>
