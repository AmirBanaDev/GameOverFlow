@extends('layouts.master')

@section('content')

<div class="card text-right">
    @foreach ($messages as $message)
    <div class="card-body">
        <h5 class="card-title">از طرف{{'\App\Models\User'::find($message->sender)->name}}</h5>
        <p class="card-text">{{$message->message}}</p>
        <p class="card-text">با هزینه{{$message->fee}}هزار تومان</p>
        <hr>
        <div class="row">
          <div class="col">
              <form action="/user/{{$message->sender}}/send" class="form" method="POST">
                @csrf
                  <div class="form-group col-md-5">
                    <textarea class="form-control" name="message" id="" cols="10" rows="5" placeholder="متن پیام"></textarea>
                    <input type="text" name="fee" class="form-control" placeholder="قیمت (تومن)" value="{{$message->fee}}">
                    <input type="hidden" name="sender" class="form-control" value="{{Auth::id()}}">
                    <button type="submit" class="form-control btn btn-primary mx-2 my-2">پاسخ</button>
                  </div>
                </form>
          </div>
          <div class="col">
            <form action="/user/message/{{$message->id}}/destroy" class="form" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger float-left">حذف</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</body>
</html>

@endsection
