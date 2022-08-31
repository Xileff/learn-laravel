@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>

                <p>By. <a href="/authors/{{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->username }}</a>
                    in
                    <a href="/categories/{{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                </p>

                <img src="https://source.unsplash.com/1000x400?{{ $post->category->name }}" alt="{{ $post->category->name }}"
                    class="img-fluid">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/posts" class="d-block mt-3 text-decoration-none">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
