@extends('layout.app')
@section('content')


    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-lg-8 col-md-6">
                            <h3 class="mb-0 text-truncated">{{auth()->user()->name}}</h3>

                            <p>
                               {{$user_descript}}
                            </p>
                            <p>
                                <p class="card-text"><small class="text-muted">Naposledy aktualizované {{date('d.m.Y.H:i', strtotime($last_update))}}</small></p>

                            </p>
                            <p> <span class="badge badge-info tags">Autor</span>
                            </p>
                        </div>
                        <div class="col-12 col-lg-4 col-md-6 text-center">
                        <img src="/storage/profile_pics/{{$profile_pic}}" alt="" class="mx-auto rounded-circle img-fluid">
                            <br>
                            <ul class="list-inline ratings text-center" title="Ratings">
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><span class="fa fa-star"></span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0">{{count($posts)}}</h3>
                            <small>Napísané články</small>
                            @if (Auth::user())
                            <a class="btn btn-block btn-outline-success" href="/users/{{auth()->user()->id}}/edit"><span class="fa fa-plus-circle"></span>  Upraviť profil</a>
                            @endif

                        </div>

                        </div>
                        <!--/col-->
                    </div>
                    <!--/row-->
                </div>
                <!--/card-block-->
            </div>



    <div class="col-md-8 mt-5">
        <div class="card">
            <div class="card-header">Ovládací panel</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="/posts/create" class='btn btn-primary'>Začať písať</a>
                <hr>
                <h1>Vaše príspevky</h1>

                @if (count($posts) > 0)
                    <table class="table">
                        <tr>
                            <th class="col">Titulok</th>
                            <th class="col"></th>
                            <th class="col"></th>
                        </tr>
                        @foreach ($posts as $post )
                        <tr>
                        <td>{{$post->title}}</td>
                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-light">Edit</a></td>
                            <td>{!! Form::open(['action'=> ['PostsController@destroy', $post->id, 'method'=> 'POST', 'class'=> 'pull-right']]) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::submit('Vymazať', ['class'=>'btn btn-warning']) !!}
                            {!! Form::close() !!}</td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p class="text-muted">Nemáš žiadne príspevky :(</p>
                @endif





            </div>
        </div>
    </div>
</div>
</div>

@endsection
