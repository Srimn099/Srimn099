@extends('templates/dashboard')
@section('content')
<div class="my-4 row justify-content-center">
    <div class="card border-0 px-5">
        <small class="text-muted text-center mt-2 mb-3">
            <span class="badge bg-primary text-white mb-3">Edit</span>
            <h3 class="text-dark">Category</h3>
        </small>
        <form action="/dashboard/categories/{{ $category->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="btn text-white bg-primary float-end"><i class="fas fa-save me-1"></i> Save Data</button>
        </form>
    </div>
</div>
@endsection
