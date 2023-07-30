<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthenticateController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', ([homeController::class, 'index']));
Route::get('/{category}/posts', ([PostController::class, 'showCategoryPosts']));
Route::get('/post/{post}', ([PostController::class, 'show']));
Route::get('/category', ([CategoryController::class, 'index']));
Route::get('/user/{user}/profile', ([UserController::class, 'profile']));

//*For guest
Route::middleware('guest')->group(function(){
    Route::get('/sign', ([AuthenticateController::class, 'index']));
    Route::post('/sign/login', ([AuthenticateController::class, 'login']));
    Route::post('/sign/register', ([AuthenticateController::class, 'register']));
});

//*Auth needed
Route::middleware(['auth'])->group(function () {
    Route::post('/{post}/comment/store', ([CommentController::class, 'store']));
    Route::post('/addpost/store', ([PostController::class, 'store']));
    Route::get('/addpost', ([PostController::class, 'create']));
    Route::delete('/logout', ([AuthenticateController::class, 'logout']));
    Route::get('/user/message', ([UserController::class, 'message']));
    Route::get('/user/setting', ([UserController::class, 'setting']));
    Route::patch('/user/setting/{user}/update', ([UserController::class, 'update']));
    Route::post('/user/{user}/send',([MessageController::class,'store']));
    Route::delete('/user/message/{message}/destroy',([MessageController::class,'destroy']));
    Route::post('/post/{post}/{comment}/dislike',([ScoreController::class,'dislike']));
    Route::post('/post/{post}/{comment}/like',([Scorecontroller::class,'like']));
});


//* admins
Route::middleware(['admin'])->group(function () {
Route::get('/admin/dashboard', ([AdminController::class, 'dashboard']));
Route::get('/admin/users', ([AdminController::class, 'users']));
Route::delete('/admin/{user}/delete', ([UserController::class, 'destroy']));
Route::get('/admin/category', ([AdminController::class, 'categories']));
Route::post('/admin/category/store', ([CategoryController::class, 'store']));
Route::delete('/admin/category/{category}/delete', ([CategoryController::class, 'destroy']));
Route::get('/admin/category/{category}/edit', ([CategoryController::class, 'edit']));
Route::patch('/admin/category/{category}/update', ([CategoryController::class, 'update']));
Route::get('/admin/post/all', ([AdminController::class, 'posts']));
Route::get('/admin/post/accepted-posts', ([AdminController::class, 'acceptedPosts']));
Route::get('/admin/post/pendding-posts', ([AdminController::class, 'penddingPosts']));
Route::Patch('/admin/post/{post}/accept', ([PostController::class, 'acceptPost']));
Route::delete('/admin/post/{post}/reject', ([PostController::class, 'rejectPost']));
Route::get('/admin/comments', ([AdminController::class, 'comments']));
Route::patch('/admin/comments/{comment}/accept', ([CommentController::class, 'acceptComment']));
Route::delete('/admin/comments/{comment}/reject', ([CommentController::class, 'rejectComment']));
});
