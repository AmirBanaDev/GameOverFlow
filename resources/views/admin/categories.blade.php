@extends('layouts.master')

@section('content')


<div class="container">
    <h2>مدیریت دسته بندی ها</h2>
    <p>اضافه کردن دسته بندی جدید:</p>

    <form class="form" action="category/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="category_name">اسم دسته:</label>
            <input type="text" class="form-control" id="category_name" name="category_name" required>
        </div>
        <div class="form-group">
            <label for="category_image">تصویر دسته:</label>
            <input type="file" class="form-control-file" id="category_image" name="category_image">
        </div>
        <button type="submit" class="btn btn-primary">اضافه کردن</button>
    </form>

    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>تصویر زمینه</th>
                <th>نام دسته بندی</th>
                <th>تعداد پست</th>
                <th>عمل ها</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td><img src="{{str_replace('public','/storage',$category->image)}}" alt="Category Image" width="300px" height="200px"></td>
                <td>{{$category->game}}</td>
                <td>{{count($category->posts)}}</td>
                <td>
                    <form class="form" action="category/{{$category->id}}/delete" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">حذف</button>
                    </form>
                    <a href="category/{{$category->id}}/edit" class="btn btn-warning">ویرایش</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
@endsection
