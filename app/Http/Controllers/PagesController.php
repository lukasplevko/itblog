<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;

class PagesController extends Controller
{
        public function index()
        {

           return view('welcome');
        }

        public function category($category){
            $posts = Post::where('theme', $category)->paginate(10);
            return view('posts.category',compact('category','posts'));
        }


}
