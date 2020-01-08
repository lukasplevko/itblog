<div>
    {{-- Do your work, then step back. --}}


    <input type="text" class="form-control" placeholder="Vyhľadaj použivateľa" wire:model="searchTerm" />
    {{ csrf_field() }}


        @if (count($users)>0)
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
                    <th scope="row"><img class="img-thumbnail" src="storage/profile_pics/{{$user->profile_pic}}" alt=""></th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                <td><a class="btn btn-info" href="users/{{$user->id}}">Profil</a></td>
                </tr>
                </tbody>
            @endforeach
        @else
            <td>
                <h3>Nikoho som nenašiel</h3>
            </td>

        @endif

      </table>

</div>
