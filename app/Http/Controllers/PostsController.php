<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // bring the eloquent 
use DB; // raw sql binding


class PostsController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $posts = Post::all();
        // return Post::where('title', 'Post Two')->get();
        // $posts = DB::select('SELECT * FROM posts');
        // $posts = Post::orderBy('created_at','desc')->take(2)->get(); //get specific number of datas sort by latest created_at
         $posts = Post::orderBy('updated_at','desc')->paginate(5); //number of entry for pagination to appear

    //    $posts = Post::orderBy('created_at','desc')->get(); //get all data sort by latest created_at
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form elements
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);
        
        // Save Post to database like using tinker
        
        $post = new Post;
        $post->title = $request -> input('title');
        $post->body = $request -> input('body');
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts')->with('success', 'Cool, Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //go to edit template

        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
//* @return \Illuminate\Http\Response
    public function update(Request $request, $id)
    {
        //
    // Validate form elements
    $this->validate($request, [
        'title' => 'required',
        'body' => 'required'
    ]);
    
    // Update Post to database like using tinker
    
    $post = Post::find($id);
    $post->title = $request -> input('title');
    $post->body = $request -> input('body');
    $post->save();

    return redirect('/posts')->with('success', 'Post Updated, Cool!');

        
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
        $post = Post::find($id);
        $post->delete();
        
        return redirect('/posts')->with('success', 'Post Removed!');
        
    }
}
