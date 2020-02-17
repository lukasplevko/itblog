<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function index(){

        $posts_chron = Post::orderBy('created_at', 'desc')->get();
        //$most_read = Post::orderBy('clicks', 'desc')->get();
        $article = Post::where('category', 'Article')->first();
        $latest = Post::orderBy('created_at', 'desc')->first();
        return view('home')->with('posts_chron', $posts_chron)->with('latest',$latest)->with('article', $article);
    }
}
