@extends('layout.app')
@section('content')


    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="mb-0 text-truncated">{{auth()->user()->name}}</h3>
                            <p>
                               {{$user->user_descript}}
                            </p>
                             <p class="card-text">
                                 <small class="text-muted">Naposledy aktualizované {{date('d.m.Y.H:i', strtotime($user->updated_at))}}</small>
                            </p>
                            @if ($user->role == 'admin')
                            <span class="badge badge-info tags">Administrátor</span>
                            @else
                            <span class="badge badge-info tags">Používateľ</span>
                            @endif


                        </div>
                        <div class="col-md-4 text-center">
                        <img src="/storage/profile_pics/{{$user->profile_pic}}" alt="" class="mx-auto rounded-circle img-fluid">

                        </div>
                        <div class="col-12 col-lg-4">
                            <h3 class="mb-0">{{count($posts)}}</h3>
                            <small>Napísané články</small>
                            @if (Auth::user())
                            <a class="btn btn-block btn-outline-success" href="/users/{{auth()->user()->id}}/edit"><span class="fa fa-plus-circle mr-1"></span>  Upraviť profil</a>
                            <a class="btn btn-block btn-outline-success" href="/lessons"><span class="fas fa-graduation-cap mr-2"></span>LearnIT</a>
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
                        <td><a href="posts/{{$post->slug}}">{{$post->title}}</a></td>
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
