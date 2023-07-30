<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row align-item-center">
            <div class="col-md-6 mt-5">
                <form action="/sign/login" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="email">آدرس ایمیل</label>
                      <input type="email" name = "email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="password">رمز عبور</label>
                      <input type="password" name="pass" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary form-control mt-3">ورود</button>
                  </form>
            </div>
            <div class="col-md-6 mt-5">
                <form action="/sign/register" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="user">نام کاربری</label>
                        <input type="text" name="user" class="form-control" id="user" placeholder="Enter username">
                      </div>
                    <div class="form-group">
                      <label for="email">آدرس ایمیل</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                      <label for="password">رمز عبور</label>
                      <input type="password" name="pass" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary form-control mt-3">ثبت نام</button>
                  </form>
            </div>
            @include('layouts.error')
        </div>
    </div>
</body>
</html>
