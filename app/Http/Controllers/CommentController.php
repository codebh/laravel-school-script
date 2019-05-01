<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Category;

class CommentController extends Controller
{
    public function addComment(Request $request,$id){

        $this->validate($request,[

            'comment'=> 'required'
        ]);
        $post = Post::findOrFail($id);

        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->ca_name = $request->input('comment');
        $comment->save();
        return redirect()->back()->with('msg','upload');

    }
    public function eachCategory($id)
    {
        $categories = Category::find($id);
        $posts = $categories->posts;
        return view('post.each')->with(['posts'=>$posts,'categories'=>$categories]);
    }
}
