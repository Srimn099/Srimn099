@extends('templates/dashboard')
@section('content')
<div class="my-4 row justify-content-center">
    <div class="card border-0 px-5">
        <small class="text-muted text-center mt-2 mb-3">
            <span class="badge bg-primary text-white mb-3">Edit</span>
            <h3 class="text-dark">Password</h3>
        </small>
        <form action="/dashboard/users/{{ $user->id }}/key" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="current" class="form-label">Current Password</label>
                <input type="password" name="current" id="current" class="form-control @error('current') is-invalid @enderror" required>
                @error('current')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="new" class="form-label">New Password</label>
                <input type="password" name="new" id="new" class="form-control @error('new') is-invalid @enderror">
                @error('new')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirm" class="form-label">Confirm Password</label>
                <input type="password" name="confirm" id="confirm" class="form-control">
            </div>
            <button type="submit" class="btn text-white bg-primary float-end"><i class="fas fa-save me-1"></i> Save Data</button>
        </form>
    </div>
</div>
@endsection
