@extends('layouts.master')

@section('content')


<div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">
        <div class="post">
            <h1 class="post-title">{{$post->title}}</h1>
          <div class="post-image">
            <img src="{{str_replace('public','/storage',$post->image)}}" alt="Post Image" with="300" height="300">
          </div>
          <div class="post-meta">
            <span class="mr-2">توسط کاربر</span>
            <a href="/user/{{$post->user->id}}/profile" class="mr-2">{{$post->user->name}}</a>
            <span class="mr-2">در تاریخ  {{$post->created_at}}</span>
            <span class="mr-2"> در دسته ی</span>
            <a href="/{{$post->category->id}}/posts" class="mr-2">{{$post->category->game}}</a>
          </div>
          <div class="post-content">
            <p>{{$post->body}}</p>
          </div>
        </div>

        @auth
        <div class="comment-box">
            <h3>کامنت بگذارید</h3>
            <form action="/{{$post->id}}/comment/store" method="POST">
              @csrf
              <div class="form-group">
                <textarea class="form-control" id="comment" name ="comment" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary m-2">Submit</button>
            </form>
          </div>
        @endauth
        <div class="comment-list">
          <h3>کامنت ها ({{count($comments)}})</h3>
            @foreach ($comments as $comment)
            <div class="border border-dark rounded m-2 p-2 ">
                <div class="comment">
                    <div class="comment-meta">
                        <span class="mr-2">توسط </span>
                      <a href="/user/{{$comment->user_id}}/profile" class="mr-2">{{$comment->user->name}}</a>
                      <span class="mr-2">در تاریخ {{$comment->created_at}} پاسخ:</span>
                    </div>
                    <div class="comment-content">
                      <p>{{$comment->body}}</p>
                    </div>
                    <div class="">
                        <span>امتیاز: {{$comment->countScore()}}</span>
                        @auth
                        @if($comment->user_id != Auth::id())
                        @if (Auth::user()->commentScored($comment))
                            <p class="mt-1">شما امتیاز {{Auth::user()->commentScoredValue($comment)}} داده اید</p>
                        @else
                        <div class="row mt-1">
                            <div class="col-md-2">
                                <form action="/post/{{$post->id}}/{{$comment->id}}/dislike" class="form-inline" method="POST">
                                    @csrf
                                    <input type="hidden" name="receiver" value="{{$comment->user_id}}">
                                    <button type="submit" class="btn btn-danger form-control">-</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <form action="/post/{{$post->id}}/{{$comment->id}}/like" class="form-inline" method="POST">
                                    @csrf
                                    <input type="hidden" name="receiver" value="{{$comment->user_id}}">
                                    <button type="submit" class="btn btn-success form-control">+</button>
                                </form>
                            </div>
                        </div>
                        @endif
                        @endif
                        @endauth
                    </div>
                </div>
            </div>
            @endforeach
        </div>
      </div>
    </div>
  </div>
</body>
</html>
@endsection
