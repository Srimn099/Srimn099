@extends('templates/dashboard')
@section('content')
<div class="my-4 row justify-content-center">
    <div class="card border-0">
        <small class="text-muted text-center mt-2 mb-3">
            <span class="badge bg-primary text-white">Detail</span>
        </small>
        <h3 class="mb-4 text-center">{{ $post->title }}</h3>
        <div class="card-image mb-3 px-4">
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid" alt="{{ $post->title }}">
            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="card-img-top img-fluid" alt="{{ $post->title }}">
            @endif
        </div>
        <div class="px-5" style="color: #707070">
            <p class="card-text">{!! $post->content !!}</p>
        </div>
    </div>
</div>
@endsection
