@extends('templates/dashboard')
@section('content')
<div class="my-4 row justify-content-center">
    <div class="card border-0 px-5">
        <small class="text-muted text-center mt-2 mb-3">
            <span class="badge bg-primary text-white mb-3">Edit</span>
            <h3 class="text-dark">User</h3>
        </small>
        <form action="/dashboard/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}" required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}">
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="hidden" name="oldImage" value="{{ $user->image }}">
                <div class="img" style="width: 115px">
                    @if ($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}" class="img-preview img-fluid mb-3 d-block rounded-circle">
                    @else
                    <img src="{{ asset('storage/profile-images/profile-sample.jpeg')  }}" class="img-preview img-fluid mb-3 rounded-circle">
                    @endif
                </div>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" onchange="previewImage()">
                @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select @error('role_id') is-invalid @enderror" id="role" name="role" required>
                    @if(old('role', $user->role) == 'admin')
                    <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                    <option value="general">general</option>
                    @elseif(old('role', $user->role) == 'general')
                    <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                    @can('admin')
                    <option value="admin">admin</option>
                    @endcan
                    @endif
                </select>
                @error('role')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-flex">
                <a href="/dashboard/users/{{ $user->id }}/key" class="btn text-white bg-white text-primary shadow-sm"><i class="fas fa-key me-1"></i> Edit Password</a>
                <button  type="submit" class="btn text-white bg-primary ms-auto"><i class="fas fa-save me-1"></i> Save Data</button>
            </div>
        </form>
    </div>
</div>
@endsection
