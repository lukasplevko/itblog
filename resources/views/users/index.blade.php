@extends('layout.app')
@section('content')


<h1>Používatelia</h1>
<br>

<div class="form-group">
            @livewire('search')
        </div>

        @livewireAssets

@endsection

