<?php

namespace App\Http\Controllers;
//Model
use App\Models\Post;
use App\Models\Comment;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //completed
    public function index(){
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        return view('posts.show', [
            'post' => $post,
        ]);
    }
    //completed
    public function create(){
        return view('posts.create');
    }
    // completed
    public function store(Request $request){
    
        $request->validate([
            'title'=>'required',
            'tag'=>'required|max:15',
            'body'=>'required',
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
    
        Post::create($input);

        return redirect('/forum')->with('success', 'Post created successfully');
    }

    public function getlike(Request $request)
    {
        $post = Post::find($request->post);
        return response()->json([
            'post'=>$post,
        ]);
    }
    public function like(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->like;
        $post->like = $value+1;
        $post->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }    
 
    public function getDislike(Request $request)
    {
        $post = Post::find($request->post);
        return response()->json([
            'post'=>$post,
        ]);
    }
 
    public function dislike(Request $request)
    {
        $post = Post::find($request->post);
        $value = $post->dislike;
        $post->dislike = $value+1;
        $post->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }
}