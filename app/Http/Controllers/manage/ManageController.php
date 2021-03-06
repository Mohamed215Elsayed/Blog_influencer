<?php

namespace App\Http\Controllers\manage;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function index()
    {

        
        $latestUsers = User::latest()->limit(5)->get();
        $latestPosts = Post::latest()->limit(5)->get();

    

        return view('manage.index', [

            'numberOfUsers' => User::count(),
            'comment_count' => Comment::count(),
            'Posts_count' => Post::count(),
            'latestUsers' => $latestUsers,
            'latestPosts' =>$latestPosts
            
        ]);
    }
}
