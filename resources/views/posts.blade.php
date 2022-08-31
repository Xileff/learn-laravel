{{-- @dd($posts) --}}

@extends('layouts.main')

@section('container')
    <h1>{{ $title }}</h1>

    @if ($posts->count())
        {{-- Hero post --}}
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="{{ $posts[0]->category->name }}">
            <div class="card-body text-center">
                <h5 class="card-title">{{ $posts[0]->title }}</h5>

                <small class="text-muted">
                    <p>By. <a href="/authors/{{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->username }}</a> in <a
                            href="/categories/{{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}</p>
                </small>

                <p class="card-text">{{ $posts[0]->excerpt }}</p>

                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read
                    more</a>

            </div>
        </div>
    @else
        <p class="text-center fs-4">No posts found.</p>
    @endif

    <div class="container">
        <div class="row">
            @foreach ($posts->skip(1) as $post)
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="position-absolute px-3 pt-1 pb-1 text-light"
                            style="background-color: rgba(0, 0, 0, 0.7)">
                            <a href="/categories/{{ $post->category->slug }}"
                                class="text-decoration-none text-light">{{ $post->category->name }}</a>
                        </div>
                        <img src="https://source.unsplash.com/500x400?{{ $post->category->name }}" class="card-img-top"
                            alt="{{ $post->category->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <small class="text-muted">
                                <p>By. <a href="/authors/{{ $post->author->username }}"
                                        class="text-decoration-none">{{ $post->author->username }}</a>
                                    {{ $post->created_at->diffForHumans() }}</p>
                            </small>
                            <p class="card-text">{{ $post->excerpt }}</p>
                            <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

{{-- ini harus pake eager loading, karena jika tidak akan tjd N+1 problem --}}
{{-- N+1 yang dimaksud :
    - Misal ada 20 post
    - Query pertama => SELECT * FROM posts
    - Looping utk masing-masing post : SELECT dari author dan  SELECT dari category = 2 query
    - Total = Query pertama(1) dan Query dari loop(20*2 = 40)
    - 41 Query --}}
