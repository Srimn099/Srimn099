@extends('templates/auth')
@section('content')
<div class="card">
    <div class="card-image py-3">
        <h2 class="card-heading">Get started</h2>
        <small>Let us create your account</small>
    </div>
    <form action="signup" method="post" class="card-form">
        @csrf
        <div class="form mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control rounded-0 border-0 ps-0 @error('name') is-invalid @enderror" id="name" name="name" placeholder="Masukkan nama" value="{{ old('name') }}" autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control rounded-0 border-0 ps-0 @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan email" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control rounded-0 border-0 ps-0 @error('username') is-invalid @enderror" id="username" name="username" placeholder="Masukkan username" value="{{ old('username') }}">
            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control rounded-0 border-0 ps-0 @error('password') is-invalid @enderror" id="password" name="password" placeholder="******">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="action">
            <button type="submit" class="action-button">Sign Up</button>
        </div>
    </form>
    <div class="card-info">
        <p>Already have a account? <a href="/signin">Sign In</a></p>
    </div>
</div>
@endsection
