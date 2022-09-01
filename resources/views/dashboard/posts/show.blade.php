@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row mb-5 mt-5">
            <div class="col-lg-8">
                <h1>{{ $post->title }}</h1>

                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
                <a href="" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <a href="" class="btn btn-danger"><span data-feather="x-circle"></span> Delete</a>

                <img src="https://source.unsplash.com/1000x400?{{ $post->category->name }}"
                    alt="{{ $post->category->name }}" class="img-fluid mt-3">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>

                <a href="/posts" class="d-block mt-3 text-decoration-none">Back to Posts</a>
            </div>
        </div>
    </div>
@endsection
