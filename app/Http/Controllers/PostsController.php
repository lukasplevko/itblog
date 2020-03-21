<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Post;
use App\Curriculum;


class PostsController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except'=>['index','show']]);
    }








    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category'=> 'required',
            'theme' => 'required',
            'cover_image' => 'image|nullable|max:1999',

        ]);

        //Spracovanie uploadovaného suboru
        if($request->hasFile('cover_image')){
            //Vytiahni subor s jeho koncovkou
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Len nazov suboru
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Len koncovka
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Nazov suboru na uloženie

            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload obrazku

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            $image = Image::make(public_path('storage/cover_images/'.$fileNameToStore))->fit(800,533);
            $image->save();

        }else{
            if($request->input('theme')== 'laravel'){
                $fileNameToStore = 'laravel.png';
            }
            else if($request->input('theme')== 'css'){
                $fileNameToStore = 'css.png';
            }
            else if($request->input('theme')== 'js'){
                $fileNameToStore = 'js.png';
            }
             else if($request->input('theme')== 'html'){
                 $fileNameToStore = 'html.png';
            }
            else if($request->input('theme')== 'undefined'){
                $fileNameToStore = 'code.png';
            }
        }



        if($request->has('series')){
            $curriculum = new Curriculum;
            $curriculum->title = $request->input('title');
            $curriculum->body = $request->input('body');
            $curriculum->user_id = auth()->user()->id;
            $curriculum->user_name = auth()->user()->name;
            $curriculum->cover_image = $fileNameToStore;
            $curriculum->theme = $request->input('theme');
            $curriculum->category = $request->input('category');
            $curriculum->slug = Str::slug($curriculum->title, '-').time();
            $curriculum->lesson = $request->input('lesson');
            $curriculum->save();
            return redirect('/lessons')->with('success', 'Článok upravený');

        }else{

        //create post
        $post = new Post;
        $post->title =  $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->user_name = auth()->user()->name;
        $post->cover_image = $fileNameToStore;
        $post->theme = $request->input('theme');
        $post->category = $request->input('category');
        $post->slug = Str::slug($post->title, '-').time();

        $post->save();
        return redirect('/posts')->with('success', 'Článok vytvorený');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        //Zákaz editovania článkov ktoré daným userom nepatria
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Tento článok nie je možné upraviť');
        }


        return view('posts.update')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'theme' => 'required',
            'cover_image' => 'image|nullable|max:1999',

        ]);

        //Spracovanie uploadovaného suboru
        if($request->hasFile('cover_image')){
            //Vytiahni subor s jeho koncovkou
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Len nazov suboru
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            //Len koncovka
            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //Nazov suboru na uloženie

            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //Upload obrazku

            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            $image = Image::make(public_path('storage/cover_images/'.$fileNameToStore))->fit(800,533);
            $image->save();
        }
        else{
            if($request->input('theme')== 'laravel'){
                $fileNameToStore = 'laravel.png';
            }
            else if($request->input('theme')== 'css'){
                $fileNameToStore = 'css.png';
            }
            else if($request->input('theme')== 'js'){
                $fileNameToStore = 'js.png';
            }
            else if($request->input('theme')== 'html'){
                 $fileNameToStore = 'html.png';
             }
            else if($request->input('theme')== 'undefined'){
                $fileNameToStore = 'code.png';
            }
        }


        $post = Post::find($id);
        $post->title =  $request->input('title');
        $post->body = $request->input('body');
        $post->theme = $request->input('theme');
        $post->category = $request->input('category');
        $post->slug = Str::slug($post->title, '-').time();
        if($request->hasFile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }

        $post->save();
        return redirect('/posts')->with('success', 'Článok upravený');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Tento článok nie je možné odstrániť');
        }

        if($post->cover_image != 'laravel.png' && $post->cover_image != 'code.png' && $post->cover_image != 'js.png' && $post->cover_image != 'css.png'){
            //Vymaž obrázok
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Článok odstránený');
    }
}
