<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\User;
use App\Post;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::orderBy('id', 'asc')->get();
        return view('users.index')->with('users', $users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::find($id);
        $user_posts = Post::all()->where('user_id', $id);

        if(Auth::check()){

            if(auth()->user()->id == $user->id)
            {
                return redirect('/dashboard');

            }
    }
        return view('users.show')->with('user', $user)->with('user_posts', $user_posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if(auth()->user()->id !== $user->id)
        {
            return back();

        }
        return view('users.update')->with('user', $user);

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
            'name' => 'required',
            'profile_pic' => 'image|nullable|max:1999',
            ]);


            if($request->hasFile('profile_pic')){
                //Vytiahni subor s jeho koncovkou
                $filenameWithExt = $request->file('profile_pic')->getClientOriginalName();
                //Len nazov suboru
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                //Len koncovka
                $extension = $request->file('profile_pic')->getClientOriginalExtension();

                //Nazov suboru na uloženie

                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //Upload obrazku

                $path = $request->file('profile_pic')->storeAs('public/profile_pics', $fileNameToStore);

            }else{
                $fileNameToStore = 'noprofile.jpg';
            }








            //Aktualizácia mena a popisu uživateľa
            $user = User::find($id);
            $owned_posts = Post::where('user_id', '=', $id)->get();

            foreach($owned_posts as $owned_post){
                $owned_post->user_name = $request->input('name');
                $owned_post->save();
            }

            $previousName = auth()->user()->name;
            $checkUsers = DB::table('users')->get();

            $user->user_descript = $request->input('user_descript');

            $user->name = $request->input('name');
            //Kontrola či meno, ktoré si uživateľ dáva už nie je zabraté
            foreach($checkUsers as $checkUser){
                if($user->name == $checkUser->name && $user->name !== $previousName){
                    return back()->with('error', 'Uživateľ s týmto menom už existuje');
                }
            }

            if($request->hasFile('profile_pic')){
                $user->profile_pic = $fileNameToStore;
            }

            $user->save();




            return redirect('/dashboard')->with('success', 'Profil aktualizovaný')->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
