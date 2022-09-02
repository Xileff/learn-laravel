@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-md-8">
                <h1>{{ $post->title }}</h1>

                <p>{{ $post->created_at == $post->updated_at ? 'By ' : 'Updated by ' }} <a
                        href="/posts?author={{ $post->author->username }}"
                        class="text-decoration-none">{{ $post->author->username }}</a> in <a
                        href="/posts?category={{ $post->category->slug }}"
                        class="text-decoration-none">{{ $post->category->name }}</a>
                    {{ $post->created_at == $post->updated_at ? $post->created_at->diffForHumans() : $post->updated_at->diffForHumans() }}
                </p>

                {{-- blade-formatter-disable-next-line --}}
                <img src="{{ $post->image == null ? 'https://source.unsplash.com/1000x400?'.$post->category->name : str_replace('public', 'storage', asset($post->image)) }}"
                class="img-fluid">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/posts" class="d-block mt-3 text-decoration-none">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
