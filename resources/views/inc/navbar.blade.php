<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light mb-5 ">
    <a class="navbar-brand" href="#">
        <img src={{asset("img/logo.png")}} alt="">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/home">Domov <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/posts">Články</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Návody
          </a>
          <div class="dropdown-menu flex" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="/posts/category/laravel"> <img class="navbar-brand" src={{asset("img/laravel.png")}} alt=""></a>
            <a class="dropdown-item" href="/posts/category/javascript"><img class="navbar-brand" src={{asset("img/javascript.png")}} alt=""></a>

            <a class="dropdown-item" href="/posts/category/css"><img class="navbar-brand" src={{asset("img/css.png")}} alt=""></a>
          </div>
        </li>

        @if (Auth::user())
            <li class="nav-item"><a href="/dashboard" class="nav-link">Profil</a></li>
            <li class="nav-item"><a href="/logout" class="nav-link">Odhlásiť sa</a></li>
        @else
    <li class="nav-item"><a href="/login" class="nav-link">Prihlásiť sa</a></li>
        @endif

      </ul>
    </div>
  </nav>
