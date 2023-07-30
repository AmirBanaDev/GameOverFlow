@extends('layouts.master')

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">مدیریت پست‌ها</h1>

    <!-- Tabs -->
    <ul class="nav nav-tabs mb-4">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="/admin/post/all">همه پست‌ها</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="/admin/post/accepted-posts">پست‌های تایید شده</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="/admin/post/pendding-posts">پست‌های در انتظار تایید</a>
        </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content">
        <!-- All posts -->
        <div id="all-posts" class="tab-panel fade show active">
            <table class="table">
                <thead>
                    <tr>
                        <th>عنوان</th>
                        <th>نویسنده</th>
                        <th>دسته‌بندی</th>
                        <th>عملیات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                    <tr>
                        <td><a href="{{$post->id}}">{{$post->title}}</a></td>
                        <td>{{$post->user->name}}</td>
                        <td>{{$post->category->game}}</td>
                        <td>
                            <form action="/post/{{$post->id}}/accept" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">تایید</button>
                            </form>
                            <form action="{{$post->id}}/reject" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">رد</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <!-- Add more rows for all posts -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
@endsection
