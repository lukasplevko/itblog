@extends('layout.app')
@section('content')
<div class="row justify-content-center">

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img style="width:100%" src="/storage/profile_pics/{{$profile_pic}}" alt="">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">{{auth()->user()->name}}</h5>
              @if ($user_descript)
              <p class="card-text">{{$user_descript}}</p>
              @else
              <p class="card-text">Bez popisu</p>
              @endif

              <p class="card-text"><small class="text-muted">Naposledy aktualizované {{date('d.m.Y.H:i', strtotime($last_update))}}</small></p>
            <a href="/users/{{auth()->user()->id}}/edit" class="btn btn-info">Upraviť profil</a>
            </div>
          </div>
        </div>
      </div>
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
