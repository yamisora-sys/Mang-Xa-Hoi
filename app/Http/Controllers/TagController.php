<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tag-manage', ['tags' => $tags]);
    }

    public function addTag(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $input = $request->all();
        Tag::create($input);
        return back();
    }

    public function deleteTag(Request $request)
    {
        $tag = Tag::find($request->tag_id);
        $tag->delete();
        return back();
    }
}
