<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => 'All Posts by ' . $author->username,
//         'posts' => $author->posts->load('category', 'author')
//         // $author->posts akan memanggil method posts yg ada di model User
//     ]);
// });
