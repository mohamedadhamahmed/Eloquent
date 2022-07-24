<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts= Post::get();

        return view('posts.index',\compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * 
     * 
     */
    public function create()
    {
        //

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
        //frist way

        // $post=new Post();
        // $post->title=$request->title;
        // $post->body=$request->body;
        // $post->save();



        //second way 



        Post::create([
'title'=>$request->title,
'body'=>$request->body
        ]);


        //or

      //  Post::create($request->all());


      return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $posts=Post::onlyTrashed()->get();
        return view('posts.softdeletes',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
       $post= Post::findorFail($id);
       //pr use
       // $post=Post::wehre('id',$id).first();
        return view('posts.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(request  $request, $id)
    {
        //use save

         $post= Post::findorFail($id);
        // $post->title=$request->title;
        // $post->body=$request->body;
        // $post->save();


        //use create

        $post->update([
            'title'=>request->title,
            'body'=>request->body
        ]);
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post=Post::findorFail($id)->delete();

        //or 
        // Post::destory($id);
        return redirect()->route('posts.index');

    }

    public function restore($id){
        Post::withTrashed()
        ->where('id', $id)
        ->restore();
        return redirect()->route('posts.index');

    }


    public function forcedelete($id){
        Post::withTrashed()
        ->where('id', $id)
        ->forcedelete();
        return redirect()->back();
    }
}


