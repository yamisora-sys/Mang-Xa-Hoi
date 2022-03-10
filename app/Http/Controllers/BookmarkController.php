<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use App\Models\Bookmark;
use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function index()
    {
        return view('bookmark.index', compact('bookmarks'));
    }

    public function bookmark(Request $request)
    {

        if($this->is_bookmarked($request)){
            $this->unBookmark($request);
        }
        else{
            $request->validate([
                'post_id'=>'required',
            ]);
            $input = $request->all();
            $input['user_id'] = auth()->user()->id;
            Bookmark::create($input);
        }
        return redirect('/viewpost/'.$request->post_id);
    }
    public function is_bookmarked(Request $request) : bool
    {
        $bookmark = Bookmark::where('user_id', auth()->user()->id)->where('post_id', $request->post_id)->first();
        if($bookmark){
            return true;
        }
        return false;
    }

    public function unBookmark(Request $request)
    {
        $bookmark = Bookmark::where('user_id', auth()->user()->id)->where('post_id', $request->post_id)->first();
        $bookmark->delete();
    }
}
