@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 poppins">My posts</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-6" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <a href="/dashboard/categories/create" class="btn btn-primary">Create New Category</a>

    <div class="table-responsive col-lg-6">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            {{-- Kalo dikasih /edit setelah slug, maka Router untuk model yg bertipe resource akan memanggil method edit --}}
                            <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning">
                                <span data-feather="edit"></span>
                            </a>
                            {{-- method edit untuk nampilin data, method update untuk prosesnya --}}
                            <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button onclick="return confirm('Are you sure?')" class="btn btn-danger border-0"><span
                                        data-feather="x-circle"></span></button>
                            </form>
                            </a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
