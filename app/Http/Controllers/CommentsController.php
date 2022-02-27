<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
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
}
