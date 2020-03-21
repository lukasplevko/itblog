@extends('layout.app')
@section('content')
<a href="{{ url()->previous() }}" class="previous"><i class="fas fa-arrow-circle-left"></i>Lekcie</a>
<h1>{{$lesson->title}}</h1>
<div class="article">
    <img class="text-cover-img"  src="/storage/cover_images/{{$lesson->cover_image}}" alt="">
    <br><br>
    <div class="container text-box">
        {!!$lesson->body!!}
    </div>



@if(Auth::user() == $lesson->user)
<div class="btn-group ">
    <a href="/lessons/{{$lesson->id}}/edit" class="btn btn-secondary ">Edit</a>

    {!! Form::open(['action'=> ['LessonsController@destroy', $lesson->id, 'method'=> 'POST', 'class'=> 'pull-right']]) !!}
        {!! Form::hidden('_method', 'DELETE') !!}
        {!! Form::submit('Delete', ['class'=>'btn btn-danger d-inline-flex ml-2']) !!}
    {!! Form::close() !!}
</div>
@endif

<div class="mt-4">
    <h3 class="display-3">Komentáre</h3>
    <hr>
    @comments(['model' => $lesson])
</div>


@endsection
