@extends('dashboard.layouts.main')

@section('container')
    <div class="container">
        <div class="row mb-5 mt-5">
            <div class="col-lg-8">
                <h1>{{ $post->title }}</h1>

                <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span>
                    Edit</a>
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger "><span
                            data-feather="x-circle"></span> Delete</button>
                </form>

                <img src="{{ $post->image == null ? "https://source.unsplash.com/1000x400? $post->category->name" : str_replace('public', 'storage', asset($post->image)) }}"
                    alt="{{ $post->category->name }}" class="img-fluid mt-3">

                <article class="my-3 fs-5">
                    {!! $post->body !!}
                </article>
            </div>
        </div>
    </div>
@endsection
