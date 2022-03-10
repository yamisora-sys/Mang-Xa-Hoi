<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'post_id'];


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function bookmarkEmpty(Request $request) : bool
    {
        $bookmark = Bookmark::where('user_id', auth()->user()->id);
        if($bookmark){
            return true;
        }
        return false;
    }
}
