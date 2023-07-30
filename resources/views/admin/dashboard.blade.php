@extends('layouts.master')

@section('content')

<div class="container">
    <h2 class="mb-4 mt-4">بررسی کلی</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">کل پست ها</h3>
                </div>
                <div class="card-body">
                    <p>{{count($posts)}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">کل دسته بندی ها</h3>
                </div>
                <div class="card-body">
                    <p>{{count($categories)}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">کل کاربران</h3>
                </div>
                <div class="card-body">
                    <p>{{count($users)}}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

@endsection
