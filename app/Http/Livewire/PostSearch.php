<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Post;
use App\User;

class PostSearch extends Component
{

    public $searchTerm;
    public function render()
    {
        $searchTerm = '%'. $this->searchTerm.'%';
        $posts = Post::where('title', 'LIKE', $searchTerm)
        ->orWhere('user_name', 'LIKE', $searchTerm)
        ->get();

        return view('livewire.post-search')->with('posts', $posts);
    }
}
