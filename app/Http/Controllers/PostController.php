<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "Blog",
            "posts" =>  Post::all()
        ]);
    }

    // Model $post didapetin dari url, dan ditandai dengan slug di web.php
    public function show(Post $post)
    {
        return view('post', [
            "title" => "",
            "post" => $post
        ]);
    }
}
