<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\User;

class Search extends Component
{

    public $searchTerm;


    public function render()
    {

        $searchTerm = '%'. $this->searchTerm.'%';
        $users = User::where('name', 'LIKE', $searchTerm)->get();
        return view('livewire.search')->with('users',$users);
    }
}
