@extends('layouts.master')

@section('content')
      <!---------------content-------------------->
      <div class="container">
        <div class="row">
          @foreach ($posts as $post)
          @if ($post->status == 'تایید')
          <div class="col-md-12 mt-3">
            <div class="card border border-dark rounded">
              <div class="card-body">
                <h5 class="card-title"><a href="/post/{{$post->id}}">{{$post->title}}</a></h5>
              </div>
            </div>
          </div>
          @endif
          @endforeach
      </div>
</body>
</html>
@endsection
