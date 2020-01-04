<div>
    {{-- Do your work, then step back. --}}

    <input type="text" class="form-control" placeholder="Vyhľadaj použivateľa" wire:model="searchTerm" />
    {{ csrf_field() }}

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

</div>
