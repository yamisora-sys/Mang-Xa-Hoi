<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //completed
    public function index(){
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        return view('post.show', [
            'post' => $post,
            'comments' => $post->comments()->paginate(5)
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
            'tag'=>'required',
            'body'=>'required',
        ]);
    
        Post::create($request->all());

        return redirect('/forum')->with('success', 'Post created successfully');
    }
}
