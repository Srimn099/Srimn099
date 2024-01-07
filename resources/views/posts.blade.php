@extends('templates/main')
@section('content')

    <div class="row justify-content-center mb-5">
        <div class="text-center main-title mb-1">
            <h2 class="text-primary fw-bold">{{ $title }}</h2>
            <p>Look for some amazing post that might you need.</p>
        </div>
        <div class="col-sm-10 col-md-6">
            @include('templates/search')
        </div>
    </div>

    <div class="row cards d-flex flex-wrap">
        @if ($posts->count())
            @foreach ($posts as $post)
                <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-image">
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top img-fluid"
                                    alt="{{ $post->title }}">
                            @else
                                <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}"
                                    class="card-img-top img-fluid" alt="{{ $post->title }}">
                            @endif
                        </div>
                        <div class="card-body">
                            <a href="/posts?category={{ $post->category->slug }}"
                                class="text-decoration-none badge bg-primary mb-2 text-white"><small>{{ $post->category->name }}</small></a>
                            <a href="/posts/{{ $post->slug }}" class="text-decoration-none text-dark">
                                <h5 class="card-title text-truncate">{{ $post->title }}</h5>
                            </a>
                            <p class="card-text">{{ $post->excerpt }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-center fs-4">No post found.</p>
        @endif

        {{ $posts->links() }}
    </div>
@endsection
