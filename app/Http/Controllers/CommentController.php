<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
class CommentController extends Controller
{
    public function store(Request $request,Post $post)
    {
        Comment::query()->create([
            'status'=>'در انتظار',
            'body'=>$request->get('comment'),
            'user_id'=>Auth::id(),
            'post_id'=>$post->id
        ]);
        return redirect()->back();
    }
    public function acceptComment(Comment $comment)
    {
        $comment->update([
            'status'=>'تایید'
        ]);
        return back();
    }
    public function rejectComment(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
