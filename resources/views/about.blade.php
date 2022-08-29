@extends('layouts.main')
@section('container')
    <h1>Halaman about</h1>
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt={{ $name }} class="img-fluid img-thumbnail rounded-circle" width="200">
@endsection
