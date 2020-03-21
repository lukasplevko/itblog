<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use App\Post;
use App\Curriculum;
use App\Progress;

class LessonsController extends Controller
{
    

    public function classes(){
        $intro = Curriculum::where('lesson', 'intro')->get();
        $frontend = Curriculum::where('lesson', 'frontend')->get();
        $backend = Curriculum::where('lesson', 'backend')->get();
        $oop = Curriculum::where('lesson', 'oop')->get();

        $introUsr = Progress::where('user_id', auth()->user()->id)->where('lesson', 'intro')->get();
        $frontendUsr = Progress::where('user_id', auth()->user()->id)->where('lesson', 'frontend')->get();
        $backendUsr = Progress::where('user_id', auth()->user()->id)->where('lesson', 'backend')->get();
        $oopUsr = Progress::where('user_id', auth()->user()->id)->where('lesson', 'oop')->get();

        $introAmount = count($introUsr) / count($intro)*100;
       // $frontendAmount = count($frontendUsr)/count($frontend)*100;
        //$backendAmount = count($backendUsr)/count($backend)*100;
        $oopAmount = count($oopUsr) / count($oop)*100;
        return view('lessons.curriculum')->with('introAmount',$introAmount)->with('oopAmount',$oopAmount);

    }

    public function lessons($lesson){

        $lessons = Curriculum::where('lesson', $lesson)->get();
        $progress =Progress::where('user_id', auth()->user()->id)
        ->where('lesson', $lesson)
        ->get();
        if($lessons->isEmpty()){
            return abort(404);
        }else{
            return view('lessons.lessons', compact('lesson','lessons', 'progress'));
        }

    }

    public function show($slug)
    {
        $lesson = Curriculum::where('slug', $slug)->first();
        return view('lessons.show')->with('lesson',$lesson);
    }

    public function edit($id)
    {
        $post = Curriculum::find($id);
        //Zákaz editovania článkov ktoré daným userom nepatria
        if(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','Tento článok nie je možné upraviť');
        }


        return view('lessons.update')->with('post',$post);
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
            'lesson'=> 'required',
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
            $curriculum = Curriculum::find($id);
            $curriculum->title = $request->input('title');
            $curriculum->body = $request->input('body');
            $curriculum->user_id = auth()->user()->id;
            $curriculum->user_name = auth()->user()->name;
            $curriculum->cover_image = $fileNameToStore;
            $curriculum->theme = $request->input('theme');
            $curriculum->category = $request->input('category');
            $curriculum->lesson = $request->input('lesson');
            $curriculum->slug = Str::slug($curriculum->title, '-').time();
            $curriculum->save();
            return redirect('/lessons')->with('success', 'Článok upravený');

    }


    public function destroy($id)
    {
        $post = Curriculum::find($id);
        if(auth()->user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Tento článok nie je možné odstrániť');
        }

        if($post->cover_image != 'laravel.png' && $post->cover_image != 'code.png' && $post->cover_image != 'js.png' && $post->cover_image != 'css.png'){
            //Vymaž obrázok
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/lessons')->with('success', 'Článok odstránený');
    }

}
