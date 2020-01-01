@extends('layout.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Ovládací panel</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <a href="/posts/create" class='btn btn-primary'>Začať písať</a>
                <hr>
                <h1>Vaše príspevky</h1>

                @if (count($posts) > 0)
                    <table class="table table-dark table-striped">
                        <tr>
                            <th class="col">Titulok</th>
                            <th class="col"></th>
                            <th class="col"></th>
                        </tr>
                        @foreach ($posts as $post )
                        <tr>
                        <td>{{$post->title}}</td>
                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-light">Edit</a></td>
                            <td>{!! Form::open(['action'=> ['PostsController@destroy', $post->id, 'method'=> 'POST', 'class'=> 'pull-right']]) !!}
                                {!! Form::hidden('_method', 'DELETE') !!}
                                {!! Form::submit('Vymazať', ['class'=>'btn btn-warning']) !!}
                            {!! Form::close() !!}</td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p class="text-muted">Nemáš žiadne príspevky :(</p>
                @endif





            </div>
        </div>
    </div>
</div>
@endsection
