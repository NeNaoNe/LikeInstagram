<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\CategoryPost;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    #Post belongs to a user
    public function user(){
        return $this->belongsTo(User::class)->withTrashed();
    }

    # To  get all the Categories related to this post
    public function categoryPost(){
        return $this->hasMany(CategoryPost::class);
    }

    #To get all comments related to this post
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function isLiked(){
        return $this->likes()->where('user_id', Auth::user()->id)->exists(); // True OR False
        # sql = "SELECT * FROM LIKES WHERE USER_ID = AUTH::USER()->ID
    }

}
