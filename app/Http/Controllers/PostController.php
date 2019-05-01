<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $posts = Post::latest()->paginate(6);
       $categories = Category::all();
       return view('post.show')->with(['posts'=>$posts,'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'image'=>'required|image',
            'info'=>'required',
            'category'=>'required',
        ]);

        if($request->hasFile('image')){
            $imageExt = $request->file('image')->getClientOriginalExtension();
            $imageName= time().'image.'.$imageExt;
            $request->file('image')->storeAs('public/posts',$imageName);

        }
        $post = new Post();
        $post->p_title = $request->input('title');
        $post->p_image = $imageName;
        $post->p_info = $request->input('info');
        $post->user_id = auth()->user()->id;
        $post->category_id = $request->input('category');
        $post->save();
        return redirect(route('post.create'))->with('msg','upload');






    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {
      $posts =Post::find($id);
      return view('post.details')->with('posts',$posts);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     **/

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('post.index')->with('del','delete ok');


    }
}
