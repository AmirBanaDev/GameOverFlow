@extends('layouts.master')

@section('content')

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <h2 class="text-right">مدیریت کاربران</h2>
        </div>
        <!--<div class="col-md-4">
            <a href="#" class="btn btn-primary btn-block"> مستخدم</a>
        </div>-->
    </div>

    <table class="table mt-4">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">نام کاربری</th>
                <th scope="col">ایمیل</th>
                <th scope="col">نقش</th>
                <th scope="col">تنظیمات</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td class="text-right">{{$user->name}}</td>
                <td class="text-right">{{$user->email}}</td>
                <td class="text-right">{{$user->role}}</td>
                <td class="text-right">
                    @if($user->role!="admin")
                    <form action="/admin/{{$user->id}}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">حذف</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

@endsection
