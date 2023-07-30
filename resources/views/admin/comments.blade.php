@extends('layouts.master')

@section('content')

<div class="container mt-4">
    <h2>نظرات</h2>
    <table class="table">
      <thead>
      <tr>
        <th>شناسه</th>
        <th>نظر</th>
        <th>نویسنده</th>
        <th>تاریخ</th>
        <th>عملیات</th>
      </tr>
      </thead>
      <tbody>
      @foreach ($comments as $comment)
      <tr>
        <td>{{$comment->id}}</td>
        <td>{{$comment->body}}</td>
        <td>{{$comment->user->name}}</td>
        <td>{{$comment->created_at}}</td>
        <td>
            <form action="comments/{{$comment->id}}/accept" method="POST">
                @csrf
                @method('patch')
                <button type="submit" class="btn btn-success">تایید</button>
            </form>
            <form action="comments/{{$comment->id}}/reject" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">حذف</button>
            </form>
        </td>
      </tr>
      @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>

@endsection
