<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;
    protected $date = ['deleted_at'];


    protected $fillable =['title','tag','user_id' ,'body', 'image'];

    // public function getRouteKeyName()
    // {
    //     return 'post_slug';
    // }    

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
    public function allcmt(){
        return $this->hasMany(Comment::class);
    }

    public function bookmark(){
        $bookmark = Bookmark::where('user_id', auth()->user()->id)->where('post_id', $this->id)->first();
        if($bookmark){
            return true;
        }
        return false;
    }
}
