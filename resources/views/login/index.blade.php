@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="css/login.css">

    <div class="row justify-content-center">
        <div class="col-lg-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif

            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('loginError') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                </div>
            @endif

            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center">Please log in</h1>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-floating">
                        <input required type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" name="email" autofocus
                            value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input required type="password" class="form-control" id="password" placeholder="Password"
                            name="password">
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" type="submit">Log in</button>
                </form>
                <small class="d-block text-center mt-3">Not registered? <a href="/register">Register Now!</a></small>
            </main>
        </div>
    </div>
@endsection
