<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class PagesController extends Controller
{
        public function index()
        {
           return view('welcome');
        }

        public function category($category){
            $posts = Post::where('theme','=',$category)->paginate(10);

              if($posts->isEmpty()){
                  return abort(404);
              }else{
                  return view('posts.category', compact('posts'));
              }
        }

}

