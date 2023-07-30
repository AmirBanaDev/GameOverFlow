<!DOCTYPE html>
<html lang="fa" dir="rtl">
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
    <!-----------navbar--------------->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="/">GameOverFlow</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="/category">
                  دسته بندی ها
                </a>
              </li>
              @auth
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/addpost">افزودن پست</a>
              </li>
              @can('adminCheck')
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  پنل مدیریت
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/admin/dashboard">داشبورد</a></li>
                  <li><a class="dropdown-item" href="/admin/users">کاربرها</a></li>
                  <li><a class="dropdown-item" href="/admin/category">مدیریت دسته بندی ها</a></li>
                  <li><a class="dropdown-item" href="/admin/post/all">مدیریت پست ها</a></li>
                  <li><a class="dropdown-item" href="/admin/comments">مدیریت کامنت ها</a></li>
                </ul>
              </li>
              @endcan
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  ناحیه ی کاربری
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/user/{{Auth::id()}}/profile">پروفایل</a></li>
                  <li><a class="dropdown-item" href="/user/message">پیام ها</a></li>
                  <li><a class="dropdown-item" href="/user/setting">تنظیمات</a></li>
                </ul>
              </li>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="nav-link">خروج</button>
                    </form>
                </li>
              @else
                  <li class="nav-item">
                    <a class="nav-link" href="/sign">ورود/ثبت نام</a>
                  </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
