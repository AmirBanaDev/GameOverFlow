@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form class="text-right form" action="setting/{{$user->id}}/update" method="POST">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="inputUsername">نام کاربری</label>
                    <input type="text" name="name" class="form-control" id="inputUsername" placeholder="نام کاربری جدید" value="{{$user->name}}">
                  </div>
                <div class="form-group">
                  <label for="inputEmail">ایمیل</label>
                  <input type="email" name="email" class="form-control" id="inputEmail" placeholder="ایمیل جدید" value="{{$user->email}}">
                </div>
                <div class="form-group">
                    <label for="inputPassword">رمز عبور فعلی</label>
                    <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="رمز عبور فعلی">
                </div>
                <div class="form-group">
                    <label for="inputPassword">رمز عبور جدید</label>
                    <input type="password" name="newPass" class="form-control" id="inputPassword" placeholder="رمز عبور جدید">
                </div>
                <div class="form-group">
                  <label>بازی تخصصی</label>
                  <br>
                  @foreach ($categories as $category)
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="games[]" id="{{$category->id}}" value="{{$category->id}}"
                    @if ('App\Models\User'::find($user->id)->hasGame($category))
                        @checked(true)
                    @endif>
                    <label class="form-check-label" for="game1">{{$category->game}}</label>
                  </div>
                  @endforeach
                </div>
                <div class="form-group">
                    <label for="inputAbout">درباره من</label>
                    <textarea name="about" id="inputAbout" class="form-control" cols="70" rows="5">{{$user->about}}</textarea>
                  </div>
                <div class="form-group">
                  <label for="inputFee">هزینه</label>
                  <input type="number" min="0" name="fee" class="form-control" id="inputFee" placeholder="هزینه جدید" value="{{$user->fee}}">
                </div>
                <button type="submit" class="btn btn-primary mt-2">ذخیره تغییرات</button>
                @include('layouts.error')
              </form>
        </div>
    </div>
</div>
</body>
</html>
@endsection
