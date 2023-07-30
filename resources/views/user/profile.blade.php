@extends('layouts.master')

@section('content')
<div class="container my-5">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center">صفحه پروفایل</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <p>نام کاربر: <strong>{{$user->name}}</strong></p>
            <p>امتیاز کاربر: <strong>{{$user->countScore()}}</strong></p>
            <p>هزینه پیشفرض: <strong>{{$user->fee}} هزار تومان</strong></p>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <h5>درباره کاربر</h5>
            <p>{{$user->about}}</p>
          </div>
          <div class="col-md-6">
            <h5>بازی‌های تخصصی</h5>
            <div class="row">
                @foreach ($categories as $category)
                    @if($user->hasGame($category))
                    <div class="col-md-4">
                        <img src="{{str_replace('public','/storage',$category->image)}}" class="img-fluid rounded mx-auto d-block my-2">
                        <p class="text-center">{{$category->game}}</p>
                      </div>
                    @endif
                @endforeach
            </div>
          </div>
        </div>
        @if($user->id != Auth::id())
        <hr>
        <div class="row">
            <div class="col-md-12">
              <form action="/user/{{$user->id}}/send" class="form" method="POST">
                @csrf
                <div class="form-group col-md-5">
                  <textarea class="form-control" name="message" id="" cols="10" rows="5" placeholder="متن پیام"></textarea>
                  <input type="text" name="fee" class="form-control" placeholder="قیمت (تومن)">
                  <input type="hidden" name="sender" class="form-control" value="{{Auth::id()}}">
                  <button type="submit" class="form-control btn btn-secondary mx-2 my-2">دکمه درخواست جلسه</button>
                </div>
              </form>
            </div>
        @endif
        </div>
      </div>
    </div>
  </div>
</body>
</html>

@endsection
