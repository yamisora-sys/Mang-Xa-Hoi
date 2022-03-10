<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
class CommentsController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate( [
            'body' => 'required'
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        Comment::create($input);
        return back();
    }

    public function getlike(Request $request)
    {
        $comment = Comment::find($request->comment);
        return response()->json([
            'comment'=>$comment,
        ]);
    }
    public function like(Request $request)
    {
        $comment = Comment::find($request->comment);
        $value = $comment->like;
        $comment->like = $value+1;
        $comment->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }    
 
    public function getDislike(Request $request)
    {
        $comment = Comment::find($request->comment);
        return response()->json([
            'comment'=>$comment,
        ]);
    }
 
    public function dislike(Request $request)
    {
        $comment = Comment::find($request->comment);
        $value = $comment->dislike;
        $comment->dislike = $value+1;
        $comment->save();
        return response()->json([
            'message'=>'Thanks',
        ]);
    }
}
