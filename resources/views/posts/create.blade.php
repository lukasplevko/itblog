@extends('layout.app')
@section('content')
<h1>Create post</h1>
{!! Form::open(['action'=> 'PostsController@store', 'method' => 'POST' ,'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Titulok')}}
        {!! Form::text('title','', ['class' => 'form-control', 'placeholder' => 'Povinné', 'maxlength' => 50]) !!}

    </div>

    <div class="form-group">
        {{Form::label('text', 'Text')}}
        {!! Form::textarea('body','', ['id'=> 'editor','class' => 'form-control', 'placeholder' => 'Povinné']) !!}

    </div>
    <div class="form-group">
        {{Form::label('text', 'Popis')}}
        {!! Form::text('post_description','', ['class' => 'form-control', 'placeholder' => 'Nepovinné', 'maxlength' => 150]) !!}

    </div>


    <div class="form-group">
        {{Form::file('cover_image')}}
    </div>


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
