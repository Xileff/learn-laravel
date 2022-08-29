<?php

namespace App\Models;

class Post
{
    private static $blog_posts = [
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

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
