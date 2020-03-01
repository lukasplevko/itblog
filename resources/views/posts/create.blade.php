@extends('layout.app')
@section('content')
<h1>Vytvor článok</h1>
{!! Form::open(['action'=> 'PostsController@store', 'method' => 'POST' ,'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Titulok')}}
        {!! Form::text('title','', ['id'=>"title_area",'class' => 'form-control', 'placeholder' => 'Povinné', 'maxlength' => 100]) !!}
        <div id="title_area_remaining_chars"></div>

    </div>

    <div class="form-group">
        {{Form::label('text', 'Text')}}
        {!! Form::textarea('body','', ['id'=> 'editor','class' => 'form-control', 'placeholder' => 'Povinné']) !!}

    </div>



    {{Form::label('category', 'Kategória')}}
    {{Form::select('category', array('Article' => "Článok", 'Tutorial' => 'Návod'), 'nothin' ,['class'=>'custom-select my-1 mr-sm-2'])}}
    {{Form::label('theme', 'Téma')}}
    {{Form::select('theme', array('laravel' => "Laravel", 'css' => 'CSS', 'js'=>'Javascript', 'undefined'=>'Všeobecné'), 'nothin' ,['class'=>'custom-select my-1 mr-sm-2'])}}


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
