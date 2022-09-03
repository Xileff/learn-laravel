@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Category</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/categories" method="post" class="mb-5" id="formCreateCategory">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required autofocus value="{{ old('name') }}">
            </div>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required readonly value="{{ old('slug') }}">
            </div>
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>

    <script src="/js/createSlug2.js"></script>
    <script>
        const inputName = document.getElementById("name");
        const inputSlug = document.getElementById("slug");
        const route = document.getElementById("formCreateCategory").action;
        const getParam = "name";

        inputName.addEventListener("change", function() {
            createSlug(this, inputSlug, route, getParam);
        });
    </script>
@endsection
