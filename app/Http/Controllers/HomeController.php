<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function index(){

        $posts_chron = Post::orderBy('created_at', 'desc')->take(5)->get();
        $most_read = Post::orderBy('created_at', 'asc')->take(4)->get();
        $posts = Post::orderBy('created_at', 'desc')->take(10)->get();
        $latest = Post::orderBy('created_at', 'desc')->first();
        return view('home')->with('posts_chron', $posts_chron)->with('latest',$latest)->with('posts', $posts)->with('bests',$most_read);
    }
}
