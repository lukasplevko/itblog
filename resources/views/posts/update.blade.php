@extends('layout.app')
@section('content')
<h1>Edit post</h1>
{!! Form::open(['action'=> ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {!! Form::text('title',$post->title, ['class' => 'form-control', 'placeholder' => 'Title', 'maxlength' => 50]) !!}

    </div>

    <div class="form-group">
        {{Form::label('title', 'Title')}}
        {!! Form::textarea('body',$post->body, ['id'=> 'editor','class' => 'form-control', 'placeholder' => 'Body text']) !!}

    </div>

    <div class="form-group">
        {{Form::label('text', 'Popis')}}
        {!! Form::text('post_description',$post->post_description, ['class' => 'form-control', 'placeholder' => 'Nepovinné', 'maxlength' => 150]) !!}
    </div>


    {{Form::label('category', 'Kategória')}}
    {{Form::select('category', array('Article' => "Článok", 'Tutorial' => 'Návod'), $post->category ,['class'=>'custom-select my-1 mr-sm-2'])}}
    {{Form::label('theme', 'Téma')}}
    {{Form::select('theme', array('laravel' => "Laravel", 'css' => 'CSS', 'js'=>'Javascript', 'undefined'=>'Všeobecné'), $post->theme ,['class'=>'custom-select my-1 mr-sm-2'])}}


    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>

    {!! Form::hidden('_method', 'PUT') !!}
    {!! Form::submit('Submit' , ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

<script>

    ClassicEditor

        .create( document.querySelector( '#editor' ) )

        .catch( error => {

            console.error( error );

        } );


</script>

@endsection
