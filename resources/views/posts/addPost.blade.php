@extends('layouts.master')

@section('content')
<div class="container">
    <h1 class="mb-2 mt-2">افزودن پست جدید</h1>
    <div class="col-md-6 mt-4">
        <form action="/addpost/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-2">
                <input type="text" name="title" class="form-control" placeholder="تیتر">
            </div>
            <div class="form-group mb-2">
                <select name="category" class="form-control">
                    <option value="0" disabled selected>انتخاب بازی</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->game}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mb-2">
                <input type="file" name="image" class="form-control" placeholder="آپلود تصویر">
            </div>
            <div class="form-group mb-2">
                <textarea name="content" id="" row="20" class="form-control"></textarea>
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="form-control btn  btn-primary">ارسال</button>
            </div>
          </form>
    </div>
  </div>
  </body>
  </html>
@endsection
