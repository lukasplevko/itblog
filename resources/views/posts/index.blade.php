@extends('layout.app')

@section('content')
    <h1 class="h1">Uverejnené články</h1>
    <div class="d-flex flex-row flex-wrap align-content-center">



            @livewire('post-search')
        @livewireAssets
@endsection
