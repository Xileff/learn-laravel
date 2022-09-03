@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Category</h1>
    </div>

    <div class="col-lg-8">
        <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="mb-5" id="formEditCategory">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    required autofocus value="{{ $category->name }}">
            </div>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    required readonly value="{{ $category->slug }}">
            </div>
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-warning">Save Changes</button>
        </form>
    </div>

    <script src="/js/createSlug2.js"></script>
    <script>
        const inputName = document.getElementById("name");
        const inputSlug = document.getElementById("slug");
        const route = document.getElementById("formEditCategory").action;
        const getParam = "name";

        inputName.addEventListener("change", function() {
            createSlug(this, inputSlug, "/dashboard/categories", getParam);
        });
    </script>
@endsection
