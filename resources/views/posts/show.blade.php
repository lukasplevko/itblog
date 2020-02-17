@extends('layout.app')
@section('content')
<a href="{{ url()->previous() }}" class="btn btn-secondary mb-3">Back</a>
<h1>{{$post->title}}</h1>
<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
<br><br>
<div class="col-md-8">
    {!!$post->body!!}
</div>

<small>{{$post->created_at}} by  <a href="../users/{{$post->user->id}}">{{$post->user->name}} </a> </small>
<hr>

@if(Auth::user() == $post->user)
<div class="btn-group ">
    <a href="/posts/{{$post->id}}/edit" class="btn btn-secondary ">Edit</a>

    {!! Form::open(['action'=> ['PostsController@destroy', $post->id, 'method'=> 'POST', 'class'=> 'pull-right']]) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Delete', ['class'=>'btn btn-danger d-inline-flex ml-2']) !!}
    {!! Form::close() !!}
</div>
@endif

<div class="mt-4">
    <h3 class="display-3">Komentáre</h3>
    <hr>
    @comments(['model' => $post])
</div>


@endsection
