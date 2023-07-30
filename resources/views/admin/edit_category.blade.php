@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <h2>مدیریت دسته بندی ها</h2>
        <p>ویرایش دسته بندی:</p>
        <form class="form" action="update" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="category_name">اسم دسته:</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required value="{{$category->game}}">
            </div>
            <div class="form-group">
                <label for="category_image">تصویر دسته:</label>
                <input type="file" class="form-control-file" id="category_image" name="category_image">
            </div>
            <button type="submit" class="btn btn-primary">ویرایش</button>
        </form>
        @include('layouts.error')
    </div>
</div>

@endsection
