@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="css/login.css">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <main class="form-registration">
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>
                <form action="/register" method="post">
                    @csrf
                    <div class="form-floating">
                        <input required type="text" class="form-control rounded-top @error('name') is-invalid @enderror"
                            id="name" name="name" placeholder="Name" value="{{ old('nama') }}">
                        @error('name')
                            <span class="invalid-feedback m-0 p-0">{{ $message }}</span>
                        @enderror
                        <label for="name">Name</label>
                    </div>
                    <div class="form-floating">
                        <input required type="text" class="form-control @error('username') is-invalid @enderror"
                            id="username" name="username" placeholder="Username" value="{{ old('username') }}">
                        @error('username')
                            <span class="invalid-feedback m-0 p-0">{{ $message }}</span>
                        @enderror
                        <label for="username">Username</label>
                    </div>
                    <div class="form-floating">
                        <input required type="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        @error('email')
                            <span class="invalid-feedback m-0 p-0">{{ $message }}</span>
                        @enderror
                        <label for="email">Email</label>
                    </div>
                    <div class="form-floating">
                        <input required type="password"
                            class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password"
                            placeholder="Password" name="password">
                        @error('password')
                            <span class="invalid-feedback m-0 p-0">{{ $message }}</span>
                        @enderror
                        <label for="password">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                </form>
                <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login</a></small>
            </main>
        </div>
    </div>
@endsection
