{{-- @dd($posts) --}}

@extends('layouts.main')

@section('container')
    <h1>{{ $title }}</h1>
    @foreach ($posts as $post)
        <hr>
        <article class="mb-5">
            <h2><a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a></h2>

            <p>By. <a href="/authors/{{ $post->author->username }}"
                    class="text-decoration-none">{{ $post->author->username }}</a> in <a
                    href="/categories/{{ $post->category->slug }}"
                    class="text-decoration-none">{{ $post->category->name }}</a></p>

            <p>{{ $post->excerpt }}</p>
            <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more ...</a>
        </article>
    @endforeach
@endsection
