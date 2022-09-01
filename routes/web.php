<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home', ["title" => "Home"]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Felix",
        "email" => "felix@gmail.com",
        "image" => "childe.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
// Ini bakal passing {post} ke method show. Dan {post} harus sama dgn nama parameter yg ada di method show

// function show(Post $post)
// Karena buat jalanin Route Model Binding

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        "title" => "Category : $category->name",
        // kalo route model binding, gini cara utk menghindari N+1 problem
        "posts" => $category->posts->load('category', 'author'),
        "category" => $category->name
    ]);
});

Route::get('/categories', function () {
    return view('categories', [
        // kalo title dicomment, nanti error stack nya ga munculin error di baris ini. aneh
        "title" => 'Categories',
        "categories" => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/dashboard', fn () => view('dashboard.index', ["title" => "Laravel 9 | Dashboard"]))->middleware('auth');

Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
