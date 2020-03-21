@extends('layout.app')
@section('content')
<a href="{{ url()->previous() }}" class="previous"><i class="fas fa-arrow-circle-left"></i>Predošlé</a>
<h1>{{$post->title}}</h1>
<div class="article">
    <img class="text-cover-img"  src="/storage/cover_images/{{$post->cover_image}}" alt="">
    <br><br>
    <div class="container text-box">
        {!!$post->body!!}
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-lg-8 col-md-6">
                    <h3 class="mb-0 text-truncated"><a class="deco" href="/users/{{$post->user->name}}">{{$post->user->name}}</a></h3>

                        <p>
                        {{$post->user->user_descript}}
                        </p>

                         @if ($post->user->role == 'admin')
                            <span class="badge badge-info tags">Administrátor</span>
                        @else
                            <span class="badge badge-info tags">Používateľ</span>
                        @endif

                    </div>
                    <div class="col-12 col-lg-4 col-md-6 text-center">
                    <img src="/storage/profile_pics/{{$post->user->profile_pic}}" alt="" class="mx-auto rounded-circle img-fluid">
                        <br>

                    </div>


                    </div>
                    <!--/col-->
                </div>
                <!--/row-->
            </div>
            <!--/card-block-->
        </div>
    </div>
<hr>

@if(Auth::user() == $post->user)
<div class="btn-group ">
    <a href="/posts/{{$post->id}}/edit" class="btn btn-dark ">Edit</a>

    {!! Form::open(['action'=> ['PostsController@destroy', $post->id, 'method'=> 'POST', 'class'=> 'pull-right']]) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Vymazať', ['class'=>'btn btn-danger d-inline-flex ml-2']) !!}
    {!! Form::close() !!}
</div>
@endif

<div class="mt-4">
    <h3 class="display-3">Komentáre</h3>
    <hr>
    @comments(['model' => $post])
</div>


@endsection
