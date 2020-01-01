@extends('layout.app')
@section('content')
<a href="/posts" class="btn btn-secondary mb-3">Back</a>
<h1>{{$post->title}}</h1>
<img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}" alt="">
<br><br>
{!!$post->body!!}
<small>{{$post->created_at}} by {{$post->user->name}}</small>
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

@endsection
