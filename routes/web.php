<?php

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

Route::get('/blog', function () {
    $blog_posts = [
        [
            "title" => "Judul post 1",
            "slug" => "judul-post-1",
            "author" => "Felix",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio voluptates dolorem, minima laudantium molestias, hic, dignissimos incidunt et quae eaque adipisci enim assumenda. Quam numquam dicta, ab nemo accusantium non dolore accusamus quod delectus debitis doloribus reprehenderit, harum, alias ipsum iusto! Dolor non alias molestias quis est placeat praesentium ipsa?"
        ],
        [
            "title" => "Judul post 2",
            "author" => "Vincent",
            "slug" => "judul-post-2",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio voluptates dolorem, minima laudantium molestias, hic, dignissimos incidunt et quae eaque adipisci enim assumenda. Quam numquam dicta, ab nemo accusantium non dolore accusamus quod delectus debitis doloribus reprehenderit, harum, alias ipsum iusto! Dolor non alias molestias quis est placeat praesentium ipsa?"
        ]
    ];

    return view('posts', [
        "title" => "Blog",
        "posts" => $blog_posts
    ]);
});

// Single post
Route::get('posts/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title" => "Judul post 1",
            "slug" => "judul-post-1",
            "author" => "Felix",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio voluptates dolorem, minima laudantium molestias, hic, dignissimos incidunt et quae eaque adipisci enim assumenda. Quam numquam dicta, ab nemo accusantium non dolore accusamus quod delectus debitis doloribus reprehenderit, harum, alias ipsum iusto! Dolor non alias molestias quis est placeat praesentium ipsa?"
        ],
        [
            "title" => "Judul post 2",
            "author" => "Vincent",
            "slug" => "judul-post-2",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odio voluptates dolorem, minima laudantium molestias, hic, dignissimos incidunt et quae eaque adipisci enim assumenda. Quam numquam dicta, ab nemo accusantium non dolore accusamus quod delectus debitis doloribus reprehenderit, harum, alias ipsum iusto! Dolor non alias molestias quis est placeat praesentium ipsa?"
        ]
    ];

    $new_post = [];
    foreach ($blog_posts as $post) {
        if ($post['slug'] === $slug) {
            $new_post = $post;
        }
    }

    return view('post', [
        "title" => "Single Post",
        "post" => $new_post
    ]);
});
