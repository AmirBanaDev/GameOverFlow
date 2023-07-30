<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function create()
    {
        return view('posts.addPost',[
            'categories'=>Category::all()
        ]);
    }
    public function store(Request $request)
    {
        Post::query()->create([
            'title'=>$request->get('title'),
            'status'=>'در انتظار',
            'category_id'=>$request->get('category'),
            'user_id'=>Auth::id(),
            'image'=>$request->file('image')->storeAs('/public/image',$request->file('image')->getClientOriginalName()),
            'body'=>$request->get('content')
        ]);
        return redirect('/');
    }
    public function show(Post $post)
    {
        $comments = Comment::query()->where('post_id',$post->id)->where('status','تایید')->get();
        return view('posts.showpost',[
            'post'=>$post,
            'comments'=>$comments
        ]);
    }
    public function showCategoryPosts(Category $category)
    {
        return view('posts.category_posts',[
            'posts'=>$category->posts
        ]);
    }
    public function acceptPost(Post $post)
    {
        $post->update([
            'status'=>'تایید'
        ]);
        return back();
    }
    public function rejectPost(Post $post)
    {
        $post->delete();
        return back();
    }
}
