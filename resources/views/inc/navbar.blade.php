<nav class="navbar navbar-expand-lg navbar-inverse navbar-dark bg-dark">
    <a class="navbar-brand" href="/posts">ITBLOG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">


        @if (Auth::guest())
            <li class="nav-item active"><a href="{{route('login')}}" class='nav-link'>Prihlásiť sa<span class="sr-only"></span></a></li>
            <li class="nav-item active"><a href="{{route('register')}}" class='nav-link'>Zaregistrovať<span class="sr-only"></span></a></li>
            <li class="nav-item active">
                <a class="nav-link" href="/posts">Články <span class="sr-only"></span></a>
            </li>




        @else

                <li>
                    <a class="nav-link active" href="/">Domov <span class="sr-only"></span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/posts">Články <span class="sr-only"></span></a>
                </li>
                <li>
                    <a class="nav-link active" href="/users">Používatelia <span class="sr-only"></span></a>
                </li>


                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Profil
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                <a class="dropdown-item" href="/dashboard">{{Auth::user()->name}}</a>
                    <a class="dropdown-item" href="/posts">Moje články</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="/logout">Odhlásiť sa</a>
                </div>
                </li>




        @endif

            </ul>







  </nav>
  <br>
