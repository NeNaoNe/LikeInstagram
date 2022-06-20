<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $post;
    private $user;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post, User $user)
    {
        $this->post = $post;
        $this->user = $user;

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $suggested_users = $this->getSuggestedUsers();
        $all_posts = $this->post->latest()->get();
        return view('users.home')
        ->with('all_posts', $all_posts)
        ->with('suggested_users', $suggested_users);
    }

    public function getSuggestedUsers(){
        $all_users = $this->user->get()->take(10)->except(Auth::user()->id);

        $suggested_users = [];

        foreach($all_users as $user):
            if(!$user->isFollowed()):
                $suggested_users[] = $user;
            endif;
        endforeach;

        return  $suggested_users;
    }
}
