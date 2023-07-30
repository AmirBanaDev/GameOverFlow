<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard',[
            'posts'=>Post::all(),
            'categories'=>Category::all(),
            'users'=>User::all()
        ]);
    }
    public function users()
    {
        return view('admin.users',[
            'users'=>User::all()
        ]);
    }

    public function categories()
    {
        return view('admin.categories',[
            'categories'=>Category::all()
        ]);
    }
    public function posts()
    {
        return view('admin.posts',[
            'posts'=>Post::all()
        ]);
    }
    public function acceptedPosts()
    {
        $post=Post::query()->where('status','تایید')->get();
        return view('admin.accepted_posts',[
            'posts'=>$post
        ]);
    }
    public function penddingPosts()
    {
        $posts=Post::query()->where('status','در انتظار')->get();
        return view('admin.pendding_posts',[
            'posts'=>$posts
        ]);
    }
    public function comments()
    {
        $comments = Comment::query()->where('status','در انتظار')->get();
        return view('admin.comments',[
            'comments'=>$comments
        ]);
    }
}
