@extends('layout.app')
@section('content')
<div class="p-md-4">
    <h1>Vytvor svoj webový svet, svoj domov. Sladký domov</h1>
    <span class="text-muted">Je na tebe, ktorý smer si vyberieš. Môžeš ostať pri frontende alebo backende. No ak spojíš všetko dokopy, máš všetky schopnosti. Všetky elementy. Všetky pokémon kartičky, bejblejdy, céčka, éčka.. všetko. Môžeš si kúpiť sluhu, ktorý bude umývať riady lakťom, pretože to tak chceš, aby to niekto robil, aj keď je to nehumánne, ale budeš to chcieť, pretože ty si nehumánny, ty si stroj, ironman, Truban. Nebývaš s rodičmi, máš vlastnú jachtu a domov chodíš iba po zavárané kvašáky. Lebo aj keď si bohatý/á a úspešný/á, nie je nad fľašu zaváraných kvašákov.
    </span>
</div>

<hr>

<div class="row p-md-3">
    <div class="col">
        <div class="card mb-2 scale" style="width: 16rem;">
        <a href="lessons/intro">
            <img src="{{asset('img/intro.png')}}" class="card-img-top" alt="...">
        </a>
            <div class="card-body">
            <h5 class="card-title">Úvod a motivácia</h5>
            <p class="card-text">Jednoducho načo ?</p>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item">Prečo sa naučiť kódiť ?</li>
            <li class="list-group-item">Ako sa mám učiť ?</li>
            <li class="list-group-item">Práca nie je všetko, dôležitý je aj oddych</li>
            </ul>
            <div class="card-body">
            <a href="lessons/intro" class="card-link">Vstúpiť do kurzu</a>
            </div>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: {{$introAmount}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card mb-2 scale" style="width: 16rem;">
        <a href="lessons/frontend">
            <img src="{{asset('img/frontend.png')}}" class="card-img-top" alt="...">
        </a>
            <div class="card-body">
            <h5 class="card-title">HTML & CSS</h5>
            <p class="card-text">Front-end</p>
            </div>
            <ul class="list-group list-group-flush">
            <li class="list-group-item">Čo je to front-end</li>
            <li class="list-group-item">Responzívny dizajn</li>
            <li class="list-group-item">Flexbox</li>
            </ul>
            <div class="card-body">
            <a href="lessons/frontend" class="card-link">Vstúpiť do kurzu</a>
            </div>
            <div class="progress">
                <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card mb-2 scale" style="width: 16rem;">
        <a href="lessons/oop">
            <img src="{{asset('img/oop.png')}}" class="card-img-top" alt="...">
        </a>
                <div class="card-body">
                <h5 class="card-title">Objektovo orientované programovanie</h5>
                <p class="card-text">Trošku mäsa a kostí</p>
                </div>
                <ul class="list-group list-group-flush">
                <li class="list-group-item">Čo je to OOP</li>
                <li class="list-group-item">Classy atď</li>
                <li class="list-group-item">Objects cmon</li>
                </ul>
                <div class="card-body">
                <a href="lessons/oop" class="card-link">Vstúpiť do kurzu</a>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{$oopAmount}}%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card mb-2 scale" style="width: 16rem;">
            <a href="lessons/backend">
                <img src="{{asset('img/backend.png')}}" class="card-img-top" alt="...">
            </a>
                    <div class="card-body">
                    <h5 class="card-title">PHP LARAVEL</h5>
                    <p class="card-text">Here's the funny part</p>
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">Čo je backend</li>
                    <li class="list-group-item">Ovládače</li>
                    <li class="list-group-item">Artisan</li>
                    </ul>
                    <div class="card-body">
                    <a href="lessons/backend" class="card-link">Vstúpiť do kurzu</a>
                    </div>
                    <div class="progress">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
@endsection
