@extends('layouts.master')

@section('content')

<body>
	<div class="container mt-3">
		<div class="row">
			@foreach ($categories as $category)
            <div class="col-md-4">
				<div class="category">
					<img src="{{str_replace('public','/storage',$category->image)}}" alt="Category Image" width="374px" height="165px">
					<h2 class="text-center">{{$category->game}}</h2>
					<a href="/{{$category->id}}/posts" class="btn btn-primary">رفتن به صفحه بازی</a>
				</div>
			</div>
            @endforeach
		</div>
	</div>
</body>

@endsection
