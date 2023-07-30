<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Score;
use App\Models\comment;
use Illuminate\support\Facades\Auth;

class ScoreController extends Controller
{
    public function dislike(Request $request,Post $post,Comment $comment)
    {
        Score::query()->create([
            'value'=>0,
            'sender'=>Auth::id(),
            'receiver'=>$request->get('receiver'),
            'comment_id'=>$comment->id
        ]);
        return back();
    }
    public function like(Request $request,Post $post,Comment $comment)
    {
        Score::query()->create([
            'value'=>1,
            'sender'=>Auth::id(),
            'receiver'=>$request->get('receiver'),
            'comment_id'=>$comment->id
        ]);
        return back();
    }
}
