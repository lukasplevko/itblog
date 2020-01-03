@extends('layout.app')
@section('content')
<h1>Naši autori</h1>

@if (count($users) > 0)



<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Meno</th>
        <th scope="col">Email</th>
        <th></th>
      </tr>
    </thead>
    @foreach ($users as $user)
        <tbody>
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
        <td><a class="btn btn-info" href="users/{{$user->id}}">Profil</a></td>
        </tr>
        </tbody>
    @endforeach
  </table>


@else
</div>
<p>No users found..</p>

@endif
@endsection
