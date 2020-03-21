<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('img/tabfav.ico')}}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Code_blog;</title>


    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset ('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('font-awesome/css/all.css')}}">

    <link href="{{asset('ckeditor/plugins/codesnippet/lib/highlight/styles/monokai.css')}}" rel="stylesheet">
    <script src="{{asset('ckeditor/plugins/codesnippet/lib/highlight/highlight.pack.js')}}"></script>
</head>
<body>


        @include('inc.navbar')
        <div class="container mt-5 marbot">
            @include('inc.messages')
            @include('cookieConsent::index')

            @yield('content')

        </div>

    <script src="{{asset('js/app.js')}}"></script>
        <script src="{{ asset('js/main.js') }}" defer></script>
        <script>hljs.initHighlightingOnLoad();</script>
</body>
</html>
