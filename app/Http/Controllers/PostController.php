<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $title = "";
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }

        return view('posts', [
            "title" => "All Posts" . $title,

            // Kalo jalanin get(), kueri baru dijalankan database
            "posts" =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    // Model $post didapetin dari url, dan ditandai dengan slug di web.php
    public function show(Post $post)
    {
        return view('post', [
            "title" => $post->title,
            "post" => $post
        ]);
    }
}

// Overall alurnya
// Router ambil url, terus manggil CONTROLLER
// CONTROLLER manggil MODEL, lalu model query db
// CONTROLLER tampilin VIEW