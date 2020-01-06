@extends('layout.app')
@section('content')
<h1>Edit profile</h1>

{!! Form::open(['action'=> ['UsersController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data' ]) !!}
    <div class="form-group">
        {{Form::label('name', 'Meno')}}
        {!! Form::text('name',$user->name, ['class' => 'form-control', 'placeholder' => 'Povinné', 'maxlength' => 30]) !!}

    </div>

    <div class="form-group">
        {{Form::label('description', 'Popis')}}
        {!! Form::textarea('user_descript',$user->user_descript, ['id'=> 'editor','class' => 'form-control', 'placeholder' => 'Nepovinné', 'maxlength'=>150]) !!}

    </div>
    <div class="form-group">
        {{Form::file('profile_pic')}}
    </div>
    {!! Form::hidden('_method', 'PUT') !!}
    {!! Form::submit('Submit' , ['class' => 'btn btn-primary']) !!}


@endsection
