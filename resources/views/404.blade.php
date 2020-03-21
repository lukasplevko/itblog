<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('img/tabfav.ico')}}"/>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Styles -->
     <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset ('css/style.css')}}">
     <link rel="stylesheet" href="{{asset('font-awesome/css/all.css')}}">
</head>
<body class="container">
    <h3 class="display-3">Well, tak dostal si sa nikam</h3>
    <p class="lead">Ahoj, prišiel si nikam. Divné však ? Dostať sa nikam. Je to na zamyslenie. Každopádne prišiel si na podstránku kde nič nie je. Môže to byť z viacerých dôvodov. Buď sme danú kategóriu ešte nerozbehli, alebo si sa hral s url adresou takým štýlom, že si skrátka zablúdil. To nevadí. Každý občas zablúdi. Dôležité je sa potom dostať <a href="/home">naspäť.</a>  Ale nevadí nám ak si tu ešte chvíľu s nami oddýchneš. Máme ťa radi, pokojne tu chvíľu pobudni</p>
    <small class="late">Ale nie tak dlho, že to začne byť divné</small><br>
    <small class="later">Ok toto už začína byť divné, presmeruj sa prosím na domovskú stránku pomocou tohto linku <a href="/home">domov</a>. Ale radi sme ťa videli, tak ahoj, niekedy nabudúce :)</small><br>

    <script src="{{ asset('js/main.js') }}" defer></script>
</body>
</html>



