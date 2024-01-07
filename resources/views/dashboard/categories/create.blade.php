@extends('templates/dashboard')
@section('content')
<div class="my-4 row justify-content-center">
    <div class="card border-0 px-5">
        <small class="text-muted text-center mt-2 mb-3">
            <span class="badge bg-primary text-white mb-3">Create</span>
            <h3 class="text-dark">New Category</h3>
        </small>
        <form action="/dashboard/categories" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="category-name" class="form-label">Name</label>
                <input type="text" name="name" id="category-name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="category-slug" class="form-label">Slug</label>
                <input type="text" name="slug" id="category-slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" required readonly>
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}
            <button class="btn text-white bg-primary float-end"><i class="fas fa-save me-1"></i> Save Data</button>
    </div>
    </form>
</div>
</div>
@endsection
