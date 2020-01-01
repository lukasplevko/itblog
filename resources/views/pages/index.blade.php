@extends('layout.app')
@section('content')
<div class="jumbotron text-center">
    <h1> {{$title}}   </h1>
    <div >
        <a href="/login"  class="btn btn-light">
            Login
        </a>
        <a href="/register" class="btn btn-danger">
            Register
        </a>
    </div>



</div>



@endsection
