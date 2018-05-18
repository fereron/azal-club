<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Azal CLub</title>

<!-- Styles -->
    <link href="{{ asset('css/app.css?' . time()) }}" rel="stylesheet">
</head>
<body>
<section class="header" style="background: url('/images/background-top.png'); background-size: cover;">
    <div class="container">
        @include('layouts.index-nav')

        @yield('content')

    </div>
</section>


<!-- Scripts -->
<script src="{{ asset('js/app.js?' . time()) }}" defer></script>
</body>
</html>
