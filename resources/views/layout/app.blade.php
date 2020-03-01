<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('img/tabfav.ico')}}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Code_blog;</title>



    <script src="{{asset('js/ckeditor.js')}}"></script>
    <script src="{{asset('js/app.js') }}" defer></script>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('css/style.css')}}">




</head>
<body>


        @include('inc.navbar')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>







</body>



<script src="{{ asset('js/main.js') }}" defer></script>
</html>
