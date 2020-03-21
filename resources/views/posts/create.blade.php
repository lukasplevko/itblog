@extends('layout.app')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vytvor článok</title>
</head>
<body>
    <div class="container mt-5">
    <h1>Vytvor článok</h1>
    {!! Form::open(['action'=> 'PostsController@store', 'method' => 'POST' ,'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Titulok')}}
        {!! Form::text('title','', ['id'=>"title_area",'class' => 'form-control', 'placeholder' => 'Povinné', 'maxlength' => 100]) !!}


    </div>

    <div class="form-group">
        {{Form::label('text', 'Text')}}
        {!! Form::textarea('body', ' ',['id'=> 'editor','class' => 'form-control', 'placeholder' => 'Body text']) !!}

    </div>



    {{Form::label('category', 'Kategória')}}
    {{Form::select('category', array('Article' => "Článok", 'Tutorial' => 'Návod'), 'nothin' ,['class'=>'custom-select my-1 mr-sm-2'])}}
    {{Form::label('theme', 'Téma')}}
    @if (Auth::user()->role == 'admin')
    {{Form::select('theme', array('laravel' => "Laravel", 'css' => 'CSS','html' => 'HTML','js'=>'Javascript', 'undefined'=>'Všeobecné'), 'nothin' ,['class'=>'custom-select my-1 mr-sm-2'])}}
    {!! Form::label('lesson', 'Témy do učebných materiálov') !!}
    {{Form::select('lesson', array('intro' => "Intro", 'frontend' => 'Frontend', 'oop'=>'OOP', 'backend'=>'Backend'), 'nothin' ,['class'=>'custom-select my-1 mr-sm-2 lessons'])}}
    {!! Form::checkbox('series', null , null, ['id' => 'serial']) !!} <span>Seriál k učebným materiálom</span>
    <br>
    <br>
    @else
    {{Form::select('theme', array('laravel' => "Laravel", 'css' => 'CSS', 'js'=>'Javascript', 'undefined'=>'Všeobecné'), 'nothin' ,['class'=>'custom-select my-1 mr-sm-2'])}}
    @endif

    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>




    {!! Form::submit('Submit' , ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'editor',{
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
</div>
</body>
</html>








